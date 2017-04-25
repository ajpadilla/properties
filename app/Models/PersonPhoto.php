<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Upload\Upload;

class PersonPhoto extends Model
{
	protected $upload;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'complete_path',
        'complete_thumbnail_path',
        'filename',
        'path',
        'extension',
        'size',
        'mimetype',
    	'person_id'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
    */

    protected $appends = [
        'storage_route'
    ];

    public function register(UploadedFile $file, $path = '', $data = array())
    {
        $this->upload = new Upload($file,74,103,$path);
        $this->upload->process();
        $result = array_merge($data,[
            'complete_path' => $this->upload->getCompletePublicFilePath(),
            'complete_thumbnail_path'=> $this->upload->getCompleteThumbnailPublicFilePath(),
            'filename' => $this->upload->getFileName(),
            'path' => $this->upload->getUploadPath(),
            'extension' => $this->upload->getFileExtension(),
            'size' => $this->upload->getSize(),
            'mimetype' => $this->upload->getMimeType(),
            ]);
        $this->create($result);    
    }
    
    public function getMimeTypeAttribute()
    {
        // return Storage::mimeType($this->filename.'.'.$this->extension);
    }

    public function getSizeAttribute()
    {
        //return Storage::size($this->filename.'.'.$this->extension);
    }

    public function getFilenameExtensionAttribute()
    {
       return $this->filename.'.'.$this->extension;
    }

    public function getStorageRouteAttribute()
    {
        return $this->complete_path;
    }

}
