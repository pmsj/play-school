<?php

namespace App;

use App\Models\Tag;
use Illuminate\Support\Str;
use App\TaggableScopesTrait;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

trait TaggableTrait
{
    Use TaggableScopesTrait;

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function  tag($tags)
    {
        $this->addTags($this->getWorkableTags($tags));
    }

    public function untag($tags = null)
    {
        if($tags === null)
        {
           $this->removeAllTags();
           return;
        }
        $this->removeTags($this->getWorkableTags($tags));
    }

    public function retag($tags)
    {
        $this->removeAllTags();
        $this->tag($tags);
    }

    private function removeAllTags()
    {
        $this->removeTags($this->tags);
    }

    private function removeTags(Collection $tags)
    {
        $this->tags()->detach($tags);

    }
    private function addTags(Collection $tags)
    {
        $sync = $this->tags()->syncWithoutDetaching($tags->pluck('id')->toArray());
    }
    //it's job is to return a collection
    private function getWorkableTags($tags)
    {
        if (is_array($tags))
        {
            return $this->getTagModels($tags);
        }

        if ($tags instanceof Model)
        {
            return $this->getTagModels([$tags->slug]);
        }

        return $this->filterTagsCollection($tags); // filter tags (to get rid of the things which are not tag)
    }

    // filters through and return only model
    private function filterTagsCollection(Collection $tags)
    {
        return $tags->filter(function ($tag) {
            return $tag instanceof Model;
        });
    }

    private function getTagModels(array $tags)
    {
        return Tag::whereIn('slug', $this->normaliseTagNames($tags))->get();
    }

    // it will return "slug version of anything passed
    private function normaliseTagNames(array $tags)
    {
        return array_map(function ($tag) {
            return Str::slug($tag);
        }, $tags);
    }


}
