<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;


class ProductService
{

    /** Return all ids of a given category
     *
     * @param Collection $category
     * @return array[]
     */
    public static function getCategoryIds($category)
    {
        $ids = [$category->id];

        if ($category->children) {
            foreach ($category->children as $child) {
                $ids = array_merge($ids, self::getCategoryIds($child));
            }
        }

        return $ids;
    }

    /** Shared base query — eager loads + ordering */
    public static function productsQuery()
    {
        return Product::with(['categories', 'attributeValues'])->latest();
    }

    /** Build the categories tree from root nodes (recursive via Category->children) */
    public static function buildCategoriesTree(): array
    {
        $roots = Category::whereNull('category_parent_id')
            ->with('children')
            ->orderBy('name')
            ->get();

        return self::buildTree($roots);
    }

    /** Recursive helper used by buildCategoriesTree
     *
     * @param Collection $categories
     * @return array[]
     */
    private static function buildTree($categories): array
    {
        $tree = [];

        foreach ($categories as $category) {
            $tree[] = [
                'id'       => $category->id,
                'name'     => $category->name,
                'slug'     => $category->slug,
                'children' => self::buildTree($category->children),
            ];
        }

        return $tree;
    }

    /** Return the category tree
     *
     * @param Collection $categories
     * @param string $parentPath
     * @return array[]
     */
    public static function flattenCategoryTree($categories, $parentPath = ''): array
    {
        $tree = [];

        foreach ($categories as $category) {

            $currentPath = $parentPath ? $parentPath . ' → ' . $category->name : $category->name;

            $tree[] = [
                'id' => $category->id,
                'name' => $category->name,
                'path' => $currentPath,
            ];

            if ($category->children && $category->children->count()) {
                $tree = array_merge($tree, self::flattenCategoryTree($category->children, $currentPath));
            }
        }

        return $tree;
    }

    /**
     * Find the breadcrumb path for a category inside the category tree.
     *
     * @param array $categoriesTree
     * @param string $activeSlug
     * @return array
     */
    public static function getCategoryBreadcrumbs(array $categoriesTree, string $activeSlug): array {

        foreach ($categoriesTree as $category) {

            if ($category['slug'] === $activeSlug) {
                return [[
                    'name' => $category['name'],
                    'slug' => $category['slug'],
                ]];
            }

            if (! empty($category['children'])) {
                $childPath = self::getCategoryBreadcrumbs(
                    $category['children'],
                    $activeSlug
                );

                if (! empty($childPath)) {
                    return array_merge(
                        [[
                            'name' => $category['name'],
                            'slug' => $category['slug'],
                        ]],
                        $childPath
                    );
                }
            }
        }

        return [];
    }
}
