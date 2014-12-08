<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

abstract class Controller extends BaseController {

	use ValidatesRequests;

    /**
     * @param $resource
     * @return Item
     */
    protected function newResource($resource)
    {
        // Create a top level instance somewhere
        $fractal = new Manager();
        $transformer = $resource->getTransformer();

        $item = new Item($resource, new $transformer);

        return $fractal->createData($item)->toJson();
    }

    /**
     * @param $paginator
     * @param $transformer
     * @return string
     */
    protected function resources($paginator, $transformer)
    {
        $fractal = new Manager();
        $collection = $paginator->items();

        $resource = new Collection($collection, $transformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $fractal->createData($resource)->toJson();
    }

}
