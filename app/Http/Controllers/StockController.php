<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Stock as stockResource;
use App\Http\Resources\StockCollection;
use App\Fund;
use App\Stock;
use App\Portfolio;

class StockController extends Controller
{
    public function index()
    {
        return new StockCollection(Fund::all());
    }


    public function store(Request $request){
        error_log($request);
        
        $fund = Fund::find(1);
        $fund->funds = $request->funds;
        $fund->save();
        
        Portfolio::truncate();
        Stock::truncate();

        Portfolio::insert($request->stockPortfolio);
        Stock::insert($request->stocks);


        return (new stockResource())
                ->response()
                ->setStatusCode(201);

    }

    public function show()
    {
        $fund = Fund::where('id', 1)->first()->funds;;
        $stock=Stock::all();
        $portfolio = portfolio::all();
        
        $response = [
            'funds' => $fund,
            'stocks'=>$stock,
            'portfolio' => $portfolio
            
        ];
        return response($response,201);
    }
}
