<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Services\ExamService;
use App\Subscription;

class SubscriptionService
{

    private $examService;


    public function __construct(ExamService $examService) 
    {
        $this->examService = $examService;
    }


    public function getAll() 
    {
        if (auth()->guest()) {
            return $this->getForGuest();
        } 
        return $this->getForRegistered();
    }


    public function getById($id) 
    {   
        return Subscription::findOrFail($id);
    }    


    public function hasAvailableExams($id) 
    {
        $subscription = $this->getById($id);

        return count($this->examService->getAvailable()) >= $subscription->exams;
    }


    private function getForGuest() 
    {
        return Subscription::where('active', 1)
                        ->orderBy('price', 'asc')
                        ->take(3)
                        ->get();
    }


    private function getForRegistered() 
    {
        return Subscription::where('active', 1)
                        ->where('price', '>', 0)
                        ->orderBy('price', 'asc')
                        ->take(3)
                        ->get();
    }
}