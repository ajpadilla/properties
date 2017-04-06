<?php  
	namespace App\Models\Upload;

	use Illuminate\Support\Facades\Storage;
	use Illuminate\Support\Facades\File;
	use Symfony\Component\HttpFoundation\File\UploadedFile;

	class Upload
	{
		private $file;
		
		public function __construct(UploadedFile $file)
		{
			$this->file = $file;
		}

		public function process()
		{
			$extension = $this->file->getClientOriginalExtension();
			Storage::disk('local')->put($this->file->getFilename().'.'.$extension,  File::get($this->file));
		}

		public function getFile()
		{
			return $this->file;
		}
	}

?>