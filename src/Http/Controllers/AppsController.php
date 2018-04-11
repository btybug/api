<?php
/**
 * Copyright (c) 2017. All rights Reserved BtyBug TEAM
 */

/**
 * Created by PhpStorm.
 * User: menq
 * Date: 8/15/17
 * Time: 2:43 PM
 */

namespace BtyBugHook\Api\Http\Controllers;


use BtyBugHook\Api\Repository\AppProductRepository;
use BtyBugHook\Api\Repository\AppRepository;
use BtyBugHook\Api\Repository\Plugins;
use BtyBugHook\Api\Services\AppsService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\Console\Tests\Input\StringInput;

class AppsController extends Controller
{
    public function getIndex()
    {
        return view('bty_api::Apps.index');
    }

    public function getCoreApps(
        Request $request,
        AppRepository $appRepository
    )
    {
        $selected = null;
        $products = [];
        $apps = $appRepository->getAll();
        if ($request->p) {
            $selected = $appRepository->find($request->p);
            $products = $selected->products;
        }

        if (!$selected) {
            $selected = $appRepository->first();
            $products = $selected->products;
        }

        return view('bty_api::Apps.core', compact('apps', 'selected', 'products'));
    }

    public function postCreateProduct(
        Request $request,
        AppsService $appsService
    )
    {
        $appsService->createProduct($request->get('id'), $request->get('name'));

        return redirect()->back();
    }

    public function getEditCore(
        AppProductRepository $appProductRepository,
        AppsService $appsService,
        $param = null
    )
    {
        $model = $appProductRepository->findOrFail($param);
        $product = $appsService->getForEdit($model);
        return view('bty_api::Apps.edit', compact('product','model'));
    }

    public function postEditCore(
        Request $request,
        AppProductRepository $appProductRepository,
        $param = null
    )
    {
        $product = $appProductRepository->findOrFail($param);

        $appProductRepository->update($param,$request->only('name','status','description') + [
            'json_data' => $request->except('name','status','description','_token')
        ]);

        return redirect()->back();
    }

    public function getExtra(Request $request)
    {

        $selected = null;
        $packages = new Plugins();
        $packages->appPlugins();
        $plugins = $packages->getPlugins();
        if ($request->p && isset($plugins[$request->p])) {
            $selected = $packages->find($plugins[$request->p]['name']);
        } elseif ($request->p && !isset($plugins[$request->p])) {
            abort('404');
        } elseif (!$request->p && !isset($plugins[$request->p])) {
            foreach ($plugins as $key => $plugin) {
                $selected = $packages->find($key);
                continue;
            }
        }
        $storage = $packages->getStorage();
        $enabled = true;
        if (isset($selected->name) && isset($storage[$selected->name])) {
            $enabled = false;
        }
        return view('bty_api::Apps.core', compact('plugins', 'selected', 'enabled'));
    }

    public function delete(
        Request $request,
        AppProductRepository $appProductRepository
    )
    {
        $data = $appProductRepository->findOrFail($request->get('slug'));
        $response = $appProductRepository->delete($request->get('slug'));
        return \Response::json(['success' => true, 'url' => url(route('core_apps'))]);
    }
}