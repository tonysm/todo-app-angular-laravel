<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;

abstract class Controller extends BaseController {

	use ValidatesRequests;

    /**
     * @param $resource
     * @return Item
     */
    public function newResource($resource)
    {
        // Create a top level instance somewhere
        $fractal = new Manager();
        $transformer = $resource->getTransformer();

        $item = new Item($resource, new $transformer);

        return $fractal->createData($item)->toJson();
    }

}
