<?php
namespace SnowSolution\AnyConfig\Http\Controllers;
use App\Http\Controllers\Controller;

class ConfigurationController extends Controller {

    protected $init;

    public function __construct(
        \SnowSolution\AnyConfig\Helper\Init $init
    )
    {
        $this->init = $init;
    }

    public function index()
    {
        return view('anyconfig::config')->with('init', $this->init);
    }
}