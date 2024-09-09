<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(StoreReviewRequest $request) {
        // dd($request->all());
        $data = $request->validated();
        $newReview = new Review();
        $newReview->fill($data);
        $newReview->save();
        return response()->json([
            'success' => true
        ]);
    }
}
