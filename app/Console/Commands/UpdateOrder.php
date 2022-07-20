<?php

namespace App\Console\Commands;

use App\Jobs\CommandMial;
use App\Models\Student;
use Illuminate\Console\Command;

class UpdateOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Order Num ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $school=Student::whereBetween('deleted_at',[now()->subHour(), now()])->onlyTrashed()->get();
        $ids = array_unique(array_column($school->toArray(),'school_id'));
        foreach ($ids as $rowId){
            $rows=Student::where('school_id',$rowId)->get();
               if($rows){
                   foreach ($rows as $key=>$student) {
                           $student->update(['order' => $key+1]);
                       }
               }
        }
        dispatch(new CommandMial());

    }
}
