<?php

namespace App\Http\Requests\client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required | min:5 | max:255',
            'product_slug' => 'required | max:255 | alpha_dash | '.
                        Rule::unique('project', 'product_slug')->ignore($this->route()->id, 'id'),
            'avt' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img_project' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'filenames.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'filenames2.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_field' => 'required | integer',
            'id_users' => 'required | integer',
            'introduction' => 'required | max:255',
            'video' => 'required | max:255',
            'source' => 'required | max:255',
            'ppt' => 'required | max:255',
            'avt' => '',
            'assess' => '',
            'like' => '',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên dự án',
            'name.min' => 'Tên dự án phải dài hơn :min ký tự',
            'name.max' => 'Tên dự án phải ngắn hơn :max ký tự',
            'product_slug.required' => 'Bạn chưa nhập slug của dự án ',
            'product_slug.alpha_dash' => 'Slug không đúng định dạng. Ví dụ: slug-dung-dinh-dang',
            'product_slug.unique' => 'Slug của dự án đã tồn tại',
            'product_slug.max' => 'Slug của dự án tối đa :max kí tự',
            'id_field.required' => 'Mã bộ môn không được để trống',
            'id_field.integer' => 'Mã bộ môn phải là dạng số',
            'id_users.required' => 'Mã người dùng không được để trống',
            'id_users.integer' => 'Mã người dùng phải là dạng số',
            'avt.image' => 'File tải lên phải là hình ảnh',
            'avt.mimes' => 'File tải lên phải có đuôi là jpeg,png,jpg,gif,svg',
            'avt.max' => 'File tải lên không vượt quá :max kb',
            'img_project.image' => 'File tải lên phải là hình ảnh',
            'img_project.mimes' => 'File tải lên phải có đuôi là jpeg,png,jpg,gif,svg',
            'img_project.max' => 'File tải lên không vượt quá :max kb',
            'filenames2.*.image' => 'File tải lên phải là hình ảnh',
            'filenames2.*.mimes' => 'File tải lên phải có đuôi là jpeg,png,jpg,gif,svg',
            'filenames2.*.max' => 'File tải lên không vượt quá :max kb',
            'filenames.*.image' => 'File tải lên phải là hình ảnh',
            'filenames.*.mimes' => 'File tải lên phải có đuôi là jpeg,png,jpg,gif,svg',
            'filenames.*.max' => 'File tải lên không vượt quá :max kb',

            'introduction.required' => 'Mô tả dự án không được để trống',
            'introduction.max' => 'Mô tả dự án tối đa :max kí tự',
            'video.required' => 'Link video minh họa dự án không được để trống',
            'video.max' => 'Link video minh họa dự án tối đa :max kí tự',
            'ppt.required' => 'Link powerpoint dự án không được để trống',
            'ppt.max' => 'Link powerpoint dự án tối đa :max kí tự',
            'source.required' => 'Link source code dự án không được để trống',
            'source.max' => 'Link source code dự án tối đa :max kí tự',
        ];
    }
}
