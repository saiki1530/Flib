<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\client\ProjectRequest;
use App\Models\Field;
use App\Models\Project;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProjectController extends Controller
{
    
    public function projectDetail()
    {

        return view('page.projectDetail');
    }

    public function create()
    {
        $fields = Field::all();
        return view('page.createProject', compact('fields'));
    }
    public function store(ProjectRequest $request)
    {
        $validatedData =$request->validate([
            'name' => '',
            // 'product_slug' => 'required | max:255 | alpha_dash | '.
            //             Rule::unique('project', 'product_slug')->ignore($this->route()->id, 'id'),
            'avt' => '',
            'img_project' => '',
            'id_field' => '',
            'id_users' => '',
            'introduction' => '',
            'video' => '',
            'source' => '',
            'ppt' => '',
            'assess' => '',
            'like' => '',
        ]);
        
        $files2 = [];
        if($request->hasFile('filenames2'))
		{
			foreach($request->file('filenames2') as $file)
			{
			    $name = (date('Y-m-d',time())).'_'.time().rand(1,100).'.'.$file->extension();
			    $file->move(public_path('upload/images/project'), $name);  
			    $files2[] = $name;
			}
            $validatedData["avt"] = json_encode($files2);
		}
        
        $files = [];
        if($request->hasFile('filenames'))
		{
			foreach($request->file('filenames') as $file)
			{
			    $name = (date('Y-m-d',time())).'_'.time().rand(1,100).'.'.$file->extension();
			    $file->move(public_path('upload/images/project'), $name);  
			    $files[] = $name;
			}
            $validatedData["img_project"] = json_encode($files);
		}
        Project::create($validatedData);
        return redirect()->route('client.project.create')->with('success', 'Thêm dự án mới thành công!');
    }

    public function getSlug(Request $request)
    {
        $slug = SlugService::createSlug(Project::class, 'product_slug', $request->name);
        return response()->json(['product_slug' => $slug]);
    }
}
