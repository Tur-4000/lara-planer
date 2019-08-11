<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    /**
     * Если поле slug пустое, то заполняем его конвертацией заголовка.
     *
     * @param Category $category
     */
    protected function setSlug(Category $category)
    {
        if (empty($category->slug)) {
            $category->slug = \Str::slug($category->name);
        }
    }

    public function creating(Category $category)
    {
        $this->setSlug($category);
    }

    /**
     * Handle the category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        //
    }

    public function updating(Category $category)
    {
        $this->setSlug($category);
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        //
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //
    }

    /**
     * Handle the category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
