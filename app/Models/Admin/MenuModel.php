<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    // use HasFactory;
    protected $table = 'menu';
    protected $fillable = ['title', 'icon', 'link', 'parent_id', 'name', 'id'];
    public $timestamps = false;
    public function children()
    {
        return $this->hasMany(MenuModel::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(MenuModel::class, 'parent_id');
    }

    public static function getMenuTree($parentId = 0)
    {
        // Ambil semua menu dengan parent_id yang sesuai
        $menus = self::where('parent_id', $parentId)
            ->orderBy('id', 'ASC')
            ->get();
        // ->toArray();

        $tree = [];
        foreach ($menus as $menu) {
            // dd($menu);
            // Ambil submenu untuk setiap item menu
            $children = self::getMenuTree($menu->id);
            if ($children) {
                $menu->children = $children;
            }
            $tree[] = $menu;
        }
        return $tree;
    }

    public function getMenu($menu = 'dashboard')
    {
        // Mengambil data dari tabel 'menu' berdasarkan kolom 'name'
        $menus = self::where('name', $menu)->first();
        return $menus;
    }

    public static function getFilteredData($search, $sortColumn, $sortDirection, $perPage)
    {
        return self::query()
            ->when($search, function (Builder $query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy($sortColumn, $sortDirection)
            ->paginate($perPage);
    }
    public static function cariName($name)
    {
        return self::query()
            ->where('name', 'like', "%{$name}%")
            ->select('id', 'name as text')
            ->get();
    }
}
