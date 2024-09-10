
protected $middleware = [
    // other middleware...
    \App\Http\Middleware\LogApiRequests::class,
];
Route::middleware('log.api')->group(function () {
    Route::get('/api/example', 'ExampleController@index');
});
