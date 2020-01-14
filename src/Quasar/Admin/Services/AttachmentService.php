<?php namespace Quasar\Admin\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Quasar\Core\Support\Image as ImageHelper;
use Quasar\Core\Services\ImageService;
use Quasar\Admin\Models\AttachmentLibrary;
use Quasar\Admin\Models\Attachment;
use function GuzzleHttp\Psr7\mimetype_from_extension;

class AttachmentService
{
    const FIT_CROP = 'c7402ae0-84f2-4fd2-bc80-871a3c2fab38';
    const WIDTH = '609b5b79-f5cb-45cb-ba08-1c2220b54b91';
    const HEIGHT = '7a1d9ebf-db57-4e3b-89d1-3feef931e75b';
    const WIDTH_FREE_CROP = 'ca2f4e27-8b74-4543-b2a8-c8fa6fda3fa4';
    const HEIGHT_FREE_CROP = '066bdff2-0ea4-497c-893b-7e13a60f21d1';

    public static function storeAttachmentsLibraryTmp($files)
    {
        if (!is_array($files)) $files = [$files];

        $uploads = [];
        foreach ($files as $file)
        {
            // save file in library directory, if no exist laravel create directory
            $file->store('public/tmp');

            // get mime type
            $mime = $file->getMimeType();

            $attachment = [
                'name'      => $file->getClientOriginalName(),
                'filename'  => $file->hashName(),
                'pathname'  => base_path('storage/app/public/tmp'),
                'extension' => $file->extension(),
                'url'       => asset('storage/tmp/' . $file->hashName()),
                'mime'      => $mime,
                'size'      => $file->getSize(),
                'sort'      => null
            ];

            // check if is image
            if (ImageHelper::isImageMime($mime))
            {
                /**
                 * config http://image.intervention.io with imagemagick
                 */
                Image::configure(['driver' => 'imagick']);
                $image = Image::make(storage_path('app/public/tmp/' . $file->hashName()));

                // check orientation to avoid error from mobile photo
                $image = ImageService::checkOrientation($image);

                // set image properties
                $attachment['width']    = $image->width();
                $attachment['height']   = $image->height();

                // set fields to save from EXIF to avoid utf-8 characters, that they are includes by software like Photoshop
                $attachment['data']     = ['exif' => collect($image->exif())->only(config('quasar-core.exif_fields_allowed'))];
            }

            $uploads[] = $attachment;
        }

        return $uploads;
    }

    public static function storeAttachmentsTmp(array $attachmentsLibraryTmp)
    {
        $attachmentsTmp = [];
        foreach ($attachmentsLibraryTmp as $attachmentLibraryTmp)
        {
            $hashName = ImageHelper::getHashName($attachmentLibraryTmp['extension']);

            // copy files to create attachments files from attachment library
            File::copy($attachmentLibraryTmp['pathname'] . '/' . $attachmentLibraryTmp['filename'], $attachmentLibraryTmp['pathname'] . '/' . $hashName);

            // copy attachment library tmp to attachment tmp
            $attachmentTmp = $attachmentLibraryTmp;

            // set attachments fields
            $attachmentTmp['libraryPathname']    = $attachmentLibraryTmp['pathname'];
            $attachmentTmp['libraryFilename']    = $attachmentLibraryTmp['filename'];
            $attachmentTmp['library']            = $attachmentLibraryTmp;
            $attachmentTmp['filename']           = $hashName;
            $attachmentTmp['url']                = asset('storage/tmp/' . $hashName);

            $attachmentsTmp[] = $attachmentTmp;
        }

        return $attachmentsTmp;
    }

    /**
     * Function to store attachments library elements
     * @param $attachments array
     * @return mixed
     */
    public static function storeAttachmentsLibrary($attachments)
    {
        // check that attachments is a array
        if (! is_array($attachments)) return null;

        if(! File::exists(base_path('storage/app/public/library')))
        {
            File::makeDirectory(base_path('storage/app/public/library'), 0755, true);
        }

        foreach($attachments as &$attachment)
        {
            // only save new attachments in library
            if ($attachment['isUploaded'] ?? false)
            {
                // get attachment library from attachment
                $attachmentLibrary = $attachment['library'];

                info($attachmentLibrary);

                // move file from temp file to attachment directory
                File::move($attachmentLibrary['pathname'] . '/' . $attachmentLibrary['filename'], base_path('storage/app/public/library/' . $attachmentLibrary['filename']));

                $object = AttachmentLibrary::create([
                    'name'          => $attachmentLibrary['name'],
                    'pathname'      => base_path('storage/app/public/library'),
                    'filename'      => $attachmentLibrary['filename'],
                    'url'           => asset('storage/library/' . $attachmentLibrary['filename']),
                    'mime'          => $attachmentLibrary['mime'],
                    'extension'     => $attachmentLibrary['extension'],
                    'size'          => $attachmentLibrary['size'],
                    'width'         => $attachmentLibrary['width'] ?? null,
                    'height'        => $attachmentLibrary['height'] ?? null,
                    'data'          => $attachmentLibrary['data'] ?? null
                ]);

                // set attachment library by reference
                $attachment['library']['uuid'] = $object->uuid;
            }
        }
        return $attachments;
    }

    public static function storeAttachments($attachments, $directory, $baseUrl, $attachableType, $attachableUuid, $langUuid)
    {
        // store attachments library
        $attachments = self::storeAttachmentsLibrary($attachments);

        self::manageAttachments($attachments, $directory, $baseUrl, $attachableType, $attachableUuid, $langUuid, 'store');
    }

    public static function updateAttachments($attachments, $directory, $baseUrl, $attachableType, $attachableUuid, $langUuid)
    {
        // store attachments library
        $attachments = self::storeAttachmentsLibrary($attachments);
        
        self::manageAttachments($attachments, $directory, $baseUrl, $attachableType, $attachableUuid, $langUuid, 'update');
    }

    public static function cloneAttachments($attachments, $directory, $baseUrl, $attachableType, $attachableUuid, $langUuid)
    {
        self::manageAttachments($attachments, $directory, $baseUrl, $attachableType, $attachableUuid, $langUuid, 'clone');
    }

    /**
     *  Function to store, update or clone attachments
     *
     * @access	public
     * @param   array       $attachments
     * @param   string      $directory
     * @param   string      $baseUrl
     * @param   string      $attachableType
     * @param   string      $attachableUuid
     * @param   string      $langUuid
     * @param   string      $action
     *
     */
    private static function manageAttachments($attachments, $directory, $baseUrl, $attachableType, $attachableUuid, $langUuid, $action)
    {
        // check that attachments is a array
        if (! is_array($attachments)) return;

        if (! File::exists(base_path($directory . '/' . $attachableUuid)))
        {
            File::makeDirectory(base_path($directory . '/' . $attachableUuid), 0755, true);
        }

        foreach($attachments as $attachment)
        {
            // store new attachments, if is a store or update action
            if ($attachment['isUploaded'] ?? false)
            {
                // move file from temp file to attachment directory
                File::move($attachment['pathname'] . '/' . $attachment['filename'], base_path($directory . '/' . $attachableUuid . '/' . $attachment['filename']));

                $attachmentObject = Attachment::create([
                    'commonUuid'            => Str::uuid(),
                    'langUuid'              => $langUuid,
                    'attachableUuid'        => $attachableUuid,
                    'attachableType'        => $attachableType,
                    'familyUuid'            => $attachment['familyUuid'] ?? null,
                    'sort'                  => $attachment['sort'] ?? null,
                    'alt'                   => $attachment['alt'] ?? null,
                    'title'                 => $attachment['title'] ?? null,
                    'pathname'              => base_path($directory . '/' . $attachableUuid),
                    'filename'              => $attachment['filename'],
                    'url'                   => asset($baseUrl . '/' . $attachableUuid . '/' . $attachment['filename']),
                    'mime'                  => $attachment['mime'],
                    'extension'             => $attachment['extension'],
                    'size'                  => $attachment['size'],
                    'width'                 => $attachment['width'] ?? null,
                    'height'                => $attachment['height'] ?? null,
                    'libraryUuid'           => $attachment['library']['uuid'] ?? null,
                    'libraryFilename'       => $attachment['library']['filename'] ?? null,
                    'data'                  => $attachment['data'] ?? null
                ]);

                // set fit attachment
                self::setAttachmentFit($attachmentObject);

                // create sizes from image
                self::setAttachmentSizes($attachmentObject, $baseUrl, $attachableUuid);
            }
            else
            {
                // action is update object
                if($action === 'update')
                {
                    $attachmentObject = Attachment::where('uuid', $attachment['uuid'])->first();

                    // save family uuid to know if has changed
                    $oldFamilyUuid = $attachmentObject->familyUuid;

                    // fill data
                    $attachmentObject->fill($attachment);

                    // save changes
                    $attachmentObject->save();

                    // reload eager relations
                    // https://medium.com/@JinoAntony/10-hidden-laravel-eloquent-features-you-may-not-know-efc8ccc58d9e
                    $attachmentObject->refresh();

                    if ($attachment['isChanged'] || ($oldFamilyUuid !== $attachmentObject->familyUuid))
                    {
                        // set fit attachment
                        self::setAttachmentFit($attachmentObject);

                        // create sizes from image
                        self::setAttachmentSizes($attachmentObject, $baseUrl, $attachableUuid);
                    }
                }
                // method to create attachment in new lang object
                elseif ($action === 'store' || $action === 'clone')
                {
                    $hashName = ImageHelper::getHashName($attachment['extension']);

                    // copy attachment
                    if ($action === 'clone')
                    {
                        File::copy($attachment['pathname'] . '/' . $attachment['filename'], base_path($directory . '/' . $attachableUuid . '/' . $hashName));
                        
                        // set new pathname
                        $attachment['pathname'] = base_path($directory . '/' . $attachableUuid);

                        // create new common uuid to attachment cloned
                        $attachment['commonUuid'] = Str::uuid();
                    }
                    else
                    {
                        // move file from temp file to attachment directory
                        File::copy($attachment['pathname'] . '/' . $attachment['filename'], $attachment['pathname'] . '/' . $hashName);
                    }

                    // store new lang attachment that previous exist in database
                    $attachmentObject = Attachment::create([
                        'commonUuid'            => $attachment['commonUuid'],
                        'langUuid'              => $langUuid,
                        'attachableUuid'        => $attachableUuid,
                        'attachableType'        => $attachableType,
                        'familyUuid'            => $attachment['familyUuid'] ?? null,
                        'sort'                  => $attachment['sort'] ?? null,
                        'alt'                   => $attachment['alt'] ?? null,
                        'title'                 => $attachment['title'] ?? null,
                        'pathname'              => $attachment['pathname'],
                        'filename'              => $hashName,
                        'url'                   => asset($baseUrl . '/' . $attachableUuid . '/' . $hashName),
                        'mime'                  => $attachment['mime'],
                        'extension'             => $attachment['extension'],
                        'size'                  => $attachment['size'],
                        'width'                 => $attachment['width'] ?? null,
                        'height'                => $attachment['height'] ?? null,
                        'libraryUuid'           => $attachment['library']['uuid'] ?? null,
                        'libraryFilename'       => $attachment['library']['filename'] ?? null,
                        'data'                  => $attachment['data'] ?? null
                    ]);

                    // set fit attachment
                    self::setAttachmentFit($attachmentObject);

                    // create sizes from image
                    self::setAttachmentSizes($attachmentObject, $baseUrl, $attachableUuid);
                }
            }
        }
    }

    /**
     * set fit for images
     * 
     * @param $attachment
     */
    private static function setAttachmentFit($attachment)
    {
        if ($attachment->family && ($attachment->family->fitTypeUuid === self::WIDTH || $attachment->family->fitTypeUuid === self::HEIGHT))
        {
            // http://image.intervention.io with imagemagick
            Image::configure(['driver' => 'imagick']);
            $image = Image::make(base_path('storage/app/public/library') . '/' . $attachment->libraryFilename);

            $proportion = $attachment->width / $attachment->height;

            if ($attachment->family->fitTypeUuid === self::WIDTH && $attachment->family->width > 0)
            {
                $attachment->width = $attachment->family->width;
                $attachment->height = $attachment->family->width / $proportion;

                $image->resize($attachment->width, $attachment->height);
            }
            elseif ($attachment->family->fitTypeUuid === self::HEIGHT && $attachment->family->height > 0)
            {
                $attachment->height = $attachment->family->height;
                $attachment->width = $attachment->family->height * $proportion;

                $image->resize($attachment->width, $attachment->height);
            }

            // save image
            $image->save($attachment->pathname . '/' . $attachment->filename);

            // save attachment in database
            $attachment->save();
        }
    }

    /**
     * Manage responsive sizes and save in database
     *
     * @param $attachment
     * @param $baseurl
     * @param $attachableUuid
     */
    private static function setAttachmentSizes($attachment, $baseurl, $attachableUuid)
    {
        // check that attachment has family id and is a image
        if (! empty($attachment->familyUuid) && ImageHelper::isImageMime($attachment->mime))
        {
            // get attachmentFamily
            $attachmentFamily = $attachment->family;

            if (is_array($attachmentFamily->sizes) && count($attachmentFamily->sizes) > 0)
            {
                // original size and biggest size
                $sizes[] = [
                    "size"      => 0,
                    "width"     => $attachment->width,
                    "height"    => $attachment->height,
                    "pathname"  => $attachment->pathname,
                    "filename"  => $attachment->filename,
                    "url"       => asset($baseurl . '/' . $attachableUuid . '/' . $attachment->filename)
                ];

                foreach ($attachmentFamily->sizes as $size)
                {
                    // calculate percentage that we need from image
                    $percentage = 100 - $size;

                    $width  = intval(($attachment->width * $percentage) / 100);
                    $height = intval(($attachment->height * $percentage) / 100);

                    /**
                     * config http://image.intervention.io with imagemagick
                     */
                    Image::configure(['driver' => 'imagick']);
                    $image = Image::make($attachment->pathname . '/' . $attachment->filename);
                    $image->resize($width, $height);
                    $image->save($attachment->pathname . '/' . $size . '@_' . $attachment->filename);

                    $sizes[] = [
                        "size"      => $size,
                        "width"     => $width,
                        "height"    => $height,
                        "pathname"  => $attachment->pathname,
                        "filename"  => $size . '@_' . $attachment->filename,
                        "url"       => asset($baseurl . '/' . $attachableUuid . '/' . $size . '@_' . $attachment->filename)
                    ];
                }

                $dataAttachment = $attachment->data;
                $dataAttachment['sizes'] = $sizes;

                // overwrite sizes field
                Attachment::where('uuid', $attachment->uuid)
                    ->update([
                        'data' => json_encode($dataAttachment)
                    ]);
            }
        }
    }

    public static function crop($attachment, $attachmentFamily, $crop)
    {
        // TODO: Manejar error 500 por llegar al límite de memoria (php_value memory_limit 256M)
        // config http://image.intervention.io with imagemagick
        Image::configure(['driver' => 'imagick']);

        // set image from attachment library
        $image = Image::make($attachment['library']['pathname'] . '/' . $attachment['library']['filename']);

        // set format from attachment family (jpg, png, gif, etc.) and new extension
        if (! empty($attachmentFamily['format']) && mimetype_from_extension($attachmentFamily['format']) !== $attachment['mime'])
        {
            $image = $image->encode($attachmentFamily['format'], 100); // set format image

            $attachment['filename']  = basename($attachment['filename'], '.' . $attachment['extension']) . '.' . $attachmentFamily['format'];
            $attachment['extension'] = $attachmentFamily['format']; // change extension file

            // change extension file of url
            $url = pathinfo($attachment['url']);
            $attachment['url']    = $url['dirname'] . '/' . $url['filename'] . '.' . $attachmentFamily['format'];
            // get mime type
            $attachment['mime']   = mimetype_from_extension($attachment['extension']);
        }

        // crop image
        $image->crop($crop['width'], $crop['height'], $crop['x'], $crop['y']);

        // resize image
        if ($attachmentFamily['width'] === null || $attachmentFamily['height'] === null)
        {
            $image->resize($attachmentFamily['width'], $attachmentFamily['height'], function($constraint) {
                $constraint->aspectRatio(); // Constraint the current aspect-ratio of the image.
                $constraint->upsize(); // Keep image from being upsized.
            });
        }
        else
        {
            $image->resize($attachmentFamily['width'], $attachmentFamily['height']);
        }

        // save
        $image->save(
            $attachment['pathname'] . '/' . $attachment['filename'],
            ! empty($attachmentFamily['quality']) ? 90 : $attachmentFamily['quality'] // set quality image
        );

        // get new properties from image cropped
        $attachment['width']  = $image->width();
        $attachment['height'] = $image->height();
        $attachment['size']   = $image->filesize();
        $attachment['data']   = ['exif' => collect($image->exif())->only(config('pulsar-core.exif_fields_allowed'))];

        return [
            'attachment'        => $attachment,
            'attachmentFamily'  => $attachmentFamily,
            'crop'              => $crop
        ];
    }

    public static function delete($attachment)
    {
        if ($attachment['uuid'] ?? false)
        {
            $attachmentObject = Attachment::where('uuid', $attachment['uuid'])->first();

            // delete attachment file
            File::delete($attachmentObject->pathname . '/' . $attachmentObject->filename);

            // if has sizes, delete your files
            if (isset($attachmentObject->data['sizes']))
            {
                foreach ($attachmentObject->data['sizes'] as $size)
                    File::delete($size['pathname'] . '/' . $size['filename']);
            }

            if (count(File::files($attachmentObject->pathname)) === 0)
                // delete directory if has not any file
                File::deleteDirectory($attachmentObject->pathname);


            // delete attachment from database
            $attachmentObject->delete();
        }
        else
        {
            // delete attachment file, use properties from input,
            // because it may not to be created in database
            File::delete($attachment['pathname'] . '/' . $attachment['filename']);
            File::delete($attachment['library']['pathname'] . '/' . $attachment['library']['filename']);
        }

        return $attachment;
    }

    /**
     *  Function to delete all attachments from object.
     *  This function is called when any object is destroy
     *
     * @access	public
     * @param   string      $attachableUuid
     * @param   string      $attachableType
     * @param   string      $langUuid
     */
    public static function deleteAttachments($attachableUuid, $attachableType, $langUuid)
    {
        $queryBuilder = Attachment::builder()
            ->where('attachable_uuid', $attachableUuid)
            ->where('attachable_type', $attachableType);

        if (base_lang_uuid() !== $langUuid) $queryBuilder->where('lang_uuid', $langUuid);
            
        // get attachments to delete
        $attachments = $queryBuilder->get();

        foreach ($attachments as $attachment)
        {
            if (base_lang_uuid() === $langUuid)
            {
                File::deleteDirectory($attachment->pathname);
                break;
            }
            else
            {
                // delete file
                File::delete($attachment->pathname . '/' .  $attachment->filename);

                // if has sizes, delete your files
                if (isset($attachment->data['sizes']))
                {
                    foreach ($attachment->data['sizes'] as $size)
                    {
                        File::delete($size['pathname'] . '/' . $size['filename']);
                    }
                }
            }
        }

        // delete attachments from database
        $queryBuilder->delete();
    }
}
