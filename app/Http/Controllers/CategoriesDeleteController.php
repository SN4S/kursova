<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesDeleteController extends Controller
{

    public function destroy($category_id)
    {
        dd($category_id);
        $categories=Category::find($this->category_id);
        $categories->delete();
        return redirect('admin.dashboard');
    }


}
