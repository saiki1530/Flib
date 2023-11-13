<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\client\ProjectRequest;
use App\Models\Field;
use App\Models\Project;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $perPage = 10;
        $listProject = Project::with('field')->orderBy('id', 'DESC')->paginate($perPage);
        return view('admin.project.index', compact('listProject'));
    }
    
    public function create()
    {
        $fields = Field::all();
        return view('admin.project.create', compact('fields'));
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
            'download' => '',
            'technical' => '',
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
        return redirect()->route('admin.project.index')->with('success', 'Thêm dự án mới thành công!');
    }

    public function edit($id)
    {
        $fields = Field::all();
        $project = Project::findOrFail($id);
        $list_images2 = $project->avt;
        $list_images = $project->img_project;
        return view("admin.project.edit", compact('fields', 'project', 'list_images2', 'list_images') );
    }

    public function update(ProjectRequest $request, $id)
    {
        $project = Project::findOrFail($id);
        
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
            'download' => '',
            'technical' => '',
            'status' => '',
            'visibility' => '',
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
        Project::where('id', $id)->update($validatedData);
        return redirect()->route('admin.project.index')->with('success', 'Cập nhật dự án mã '.$id. ' thành công!');
    }

    public function destroy($id)
    {
        Project::findOrFail($id)->delete();

        return redirect()->route('admin.project.index')
            ->with('success', 'Xóa dự án thành công.');
    }

    public function getSlug(Request $request)
    {
        $slug = SlugService::createSlug(Project::class, 'product_slug', $request->name);
        return response()->json(['product_slug' => $slug]);
    }

}
