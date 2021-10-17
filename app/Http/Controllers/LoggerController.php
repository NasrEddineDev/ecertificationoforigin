<?php

namespace App\Http\Controllers;

use App\Models\Logger;
use App\Models\Setting;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Config;

class LoggerController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logger  $logger
     * @return \Illuminate\Http\Response
     */
    public function show(Logger $logger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logger  $logger
     * @return \Illuminate\Http\Response
     */
    public function edit(Logger $logger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logger  $logger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if (isset($request->activity_logger_enabled)) {
            $this->updateEnvFile('ACTIVITY_LOGGER_ENABLED', $request->activity_logger_enabled);
        }
        $this->updateEnvFile('DELETE_RECORDS_OLDER_THAN_DAYS', $request->delete_records_older_than_days);

        return redirect()->route('logger.settings')
        ->with('success', 'Logger Configuration edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logger  $logger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logger $logger)
    {
        //
    }


    public function systemLog()
    {
        //
        try {
            $url = url('storage/logs/laravel.log');
            $content = file_get_contents('storage/logs/users-activities.log');
            $usersActivities = Activity::all();
            return view('logger.system-log', compact('usersActivities', 'url', 'content'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());
            return false;
        }
    }


    public function usersActivities()
    {
        //
        try {
            $usersActivities = Activity::all();
            return view('logger.users-activities', compact('usersActivities'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());
            return false;
        }
    }


    public function settings()
    {
        //
        try {
            $settings = [
                'enabled' => env('ACTIVITY_LOGGER_ENABLED'),
                'delete_records_older_than_days' => env('DELETE_RECORDS_OLDER_THAN_DAYS'),
            ];
            return view('logger.settings', $settings);
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());
            return false;
        }
    }

    protected function updateEnvFile($key, $newValue, $delim = '')
    {
        $path = base_path('.env');
        // get old value from current env
        $oldValue = env($key);

        // was there any change?
        if ($oldValue === $newValue) {
            return;
        }

        // rewrite file content with changed data
        if (file_exists($path)) {
            // replace current value with new value 
            $content = file_get_contents($path);
            $content = str_replace($key . '=' . $oldValue, $key . '=' . $newValue, $content);
            file_put_contents($path, $content);
        }
    }
}
