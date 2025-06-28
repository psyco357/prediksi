<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\MenuModel;
use Illuminate\Http\Request;

class MenuControl extends Controller
{
    //
    public function Menu()
    {
        $menus = MenuModel::getMenuTree();

        // var_dump($menus);
        return view('index', compact('menus'));
        // return view('index', compact('menu'));
    }

    public function menuSetting()
    {
        $menu = new MenuModel();
        $menus = $menu->getMenuTree();
        $currentSegment = request()->segment(2);
        $slug = empty($currentSegment) ? 'dashboard' : $currentSegment;
        $currentSegment = request()->segment(1);
        $header = empty($currentSegment) ? 'dashboard' : $currentSegment;

        // Ambil data menu berdasarkan slug
        $title = $menu->getMenu($slug);
        $head = $menu->getMenu($header);
        // var_dump($title, $menus);
        return view('admin.menu', compact('menus', 'title', 'head'));
        // return view('index', compact('menu'));
    }

    public function saveMenu(Request $request)
    {
        $menu = MenuModel::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Disimpan!' // Success message
        ]);
    }

    public function selectMenu(Request $request)
    {
        $search = $request->input('q'); // Mendapatkan parameter pencarian dari query string

        $menus = MenuModel::cariName($search);
        $mainMenu = [
            'id' => 0,
            'text' => 'Menu Utama' // Teks atau nama menu utama yang diinginkan
        ];
        $menus->prepend($mainMenu);

        return response()->json($menus);
    }

    public function semuaMenu(Request $request)
    {
        $search = $request->get('search')['value'] ?? '';
        $sortColumnIndex = $request->get('order')[0]['column'] ?? 0;
        $sortDirection = $request->get('order')[0]['dir'] ?? 'asc';
        $perPage = $request->get('length') ?? 10;
        $start = $request->get('start') ?? 0;

        $columns = ['id', 'name', 'title', 'parent_id', 'icon', 'link'];
        $sortColumn = $columns[$sortColumnIndex] ?? 'id';

        // Hitung halaman yang diminta oleh DataTables
        $currentPage = ($start / $perPage) + 1;

        // Query dengan filter dan sorting
        $query = MenuModel::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%")
                    ->orWhere('parent_id', 'like', "%{$search}%")
                    ->orWhere('icon', 'like', "%{$search}%")
                    ->orWhere('link', 'like', "%{$search}%");
            });
        }

        // Sorting
        $query->orderBy($sortColumn, $sortDirection);

        // Pagination
        $data = $query->paginate($perPage, ['*'], 'page', $currentPage);

        return response()->json([
            'draw' => $request->get('draw'),
            'recordsTotal' => $data->total(),
            'recordsFiltered' => $data->total(),
            'data' => $data->items(),
        ]);
    }
    public function update(Request $request, $id)
    {
        $menu = MenuModel::find($id);
        // dd($request->all());
        $menu->update($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Diupdate!' // Pesan sukses
        ]);
    }

    public function destroy($id)
    {
        $menu = MenuModel::find($id);
        if ($menu) {
            $menu->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Record deleted successfully.' // Pesan sukses
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Record not found.' // Pesan error jika record tidak ditemukan
        ], 404);
    }
}
