<?php

namespace App\Http\Controllers;

use App\File;
use App\Log;
use App\Repository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FilesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function repository_files($id) {
		$repository = Repository::find($id);
		$files = File::where('repository_id' , $id)->get();
		$title = $repository->name;
		$font_style = "fa fa-file-pdf-o";
		return view('layouts.files.index' , compact('files' ,'title' ,'font_style' , 'repository'));
	}

	public function repository_upload($id) {
		$repository = Repository::find($id);
		$title = 'Upload Files';
		$font_style = "fa fa-file-pdf-o";
		return view('layouts.files.create' , compact('repository' ,'title' ,'font_style'));
	}

	public function repository_post(Request $request , $id) {
		$repository = Repository::find($id);
			$this->validate($request, [
				'documents' => 'required',
				'policy_id' => 'required'
				],
				[
					'documents.required' => 'Please select a files to upload',
					'policy_id.required' => 'Policy number is required',
				]);

			$documents = $request->file('documents');
			$paths  = [];

			foreach ($documents as $document) {
				$fileOriginal =  time().$document->getClientOriginalName();
				$extension = $document->getClientOriginalExtension();
				$filename  = 'document-' . time() . '.' . $extension;
				$paths[]   = $document->storeAs( "public/documents" , $filename );

				$policy_docs = new File();
				$policy_docs->location = $filename;
				$policy_docs->user_id = Auth::id();
				$policy_docs->name = $fileOriginal;
				$policy_docs->policy_number =  strtoupper($request->policy_id) ;
				$policy_docs->repository_id = $id;
				$policy_docs->save();

				$log = Log::create([
					'log' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' Uploaded the following files ' . $filename  . ' at ' . $policy_docs->created_at,
				]);
			}
			Session::flash('success' , 'Files were successfully uploaded');
			return redirect(route('repository_files' , ['id' => $id]));
		}

		public function search_files(Request $request ,$id) {
			$this->validate($request , [
				'policy_number' => 'required',
			],
			[
				'policy_number.required' => 'Please provide a valid policy number'
			]);

			$files = File::where('repository_id' , $id)
						->where('policy_number' , strtoupper($request->policy_number) )
						->get();

			$repository = Repository::find($id);
			$title = 'Search Results';
			$font_style = "fa fa-file-pdf-o";

			return view('layouts.files.search_results' , compact('files' , 'repository' ,'title' ,'font_style'));
		}

		public function remove_file(Request $request , $id) {
		   $file_old = File::find($id);

			$file = File::destroy($id);

			$log = Log::create([
				'log' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' Deleted the following file ' . $file_old->name . ' at ' . Carbon::now(),
			]);

			Session::flash('success' , 'File Successfully Removed');
			return redirect()->back();
		}

		public function deleted_files() {
			$title = 'Deleted Documents';
			$font_style = "fa fa-file-pdf-o";
			$files = File::onlyTrashed()
			             ->get();
			return view('layouts.files.recycle' , compact('title' ,'font_style' ,'files'));
		}


		public function restore_files(Request $request , $id) {
			$file_old = File::withTrashed()->where('id', $id)->first();

			$file = File::withTrashed()
			            ->where('id', $id)
			            ->restore();

			$log = Log::create([
				'log' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' Restored the following file ' . $file_old->name . ' at ' . Carbon::now(),
			]);

			Session::flash('success' , 'File Successfully Restored');
			return redirect()->back();
		}

}
