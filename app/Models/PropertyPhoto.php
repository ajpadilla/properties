<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Upload\Upload;

class PropertyPhoto extends Model
{
	protected $upload;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'filename',
    	'original_filename', 
    	'mime', 
        'extension',
    	'complete_path', 
    	'property_id'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
    */

    protected $appends = [
        'storage_route'
    ];

    public function register(UploadedFile $file, $data = array())
    {
        $this->upload = new Upload($file);
        $this->upload->process();
        $this->create([
            'filename' => $this->upload->getFile()->getFilename(),
            'original_filename' => $this->upload->getFile()->getClientOriginalName(), 
            'mime' => $this->upload->getFile()->getClientMimeType(),
            'extension' => $this->upload->getFile()->getClientOriginalExtension(), 
            'complete_path' => public_path().'/storage', 
            'property_id' => $data['property_id']
        ]);
    }

    public function getMimeTypeAttribute()
    {
         return Storage::mimeType($this->filename.'.'.$this->extension);
    }

    public function getSizeAttribute()
    {
        return Storage::size($this->filename.'.'.$this->extension);
    }

    public function getFilenameExtensionAttribute()
    {
        return $this->filename.'.'.$this->extension;
    }

    public function getStorageRouteAttribute()
    {
        return '/storage/'.$this->filename_extension;
    }
}
