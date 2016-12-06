<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\convertNumberRequest;
use App\Http\Controllers\Controller;
use Session;

class R2nController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the response
     *
     * @return Response
     */
    public function roman(convertNumberRequest $request)
    {

        //define values
        $roman = '';
        // get the input data from the form
        $input = $request->all();
        $numeric = $input['numeric'];


        //double check and reconvert integer into an integer
        $numeric = intval($numeric);

        //check if number is greater than 3999 or smaller than 1
        if($numeric < 1 || $numeric >3999){

            //return error
            $request->session()->flash('status', 'Please add number between 1 and 3999!');
            return redirect('/');

        }

        //convert to roman
        $roman =$this->r2n($numeric);

        //return to view with roman result
        $request->session()->flash('status', 'The Roman value is '.$roman);
        return redirect('/');


    }

    /**
     * Function to handle numbers to roman creation
     */
    public function r2n($num)
    {

        //declare string value
        $romanLetter = '';

        //array with basic conversion
        $base = array(
            1000 => 'M',
            900 => 'CM',
            500 => 'D',
            400 => 'CD',
            100 => 'C',
            90 => 'XC',
            50 => 'L',
            40 => 'XL',
            10 => 'X',
            9 => 'IX',
            5 => 'V',
            4 => 'IV',
            1 => 'I',
        );

        foreach($base as $numericVal => $romanVal){

            //check how many times the decimal value is found in the base array and round to integer
            $found = intVal($num/$numericVal);

            if($found >0){

                //add roman value to result based on the $found value to determine the repetition of the character
                $romanLetter .= str_repeat($romanVal,$found);

                //recalculate the remainder value to determine
                $num = $num % ($numericVal * $found) ;

            }
        }

        //return the final roman letter string
        return $romanLetter;

    }


}