<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Dompdf\Dompdf;
class adminDashboardController extends Controller
{
    
    public function index(Request $request){
        if(!($request -> session() -> exists('login'))){
                return redirect('/admin');
        }
        
        $dogC = DB::table('doglisttbl')
                    ->select(DB::raw("COUNt('intDogID') AS CntDog"))
                    ->where('bitIsAdopted', '=', 1)
                    ->first();

        $strayC = DB::table('strayreportstbl')
                    ->select(DB::raw("COUNT('intStrayReportID') as 'CntStray'"))
                    ->where('bitResponded', '=', 1)
                    ->first();

        $missingC = DB::table('missingreportstbl')
                    ->select(DB::raw("COUNT('intMissingReportID') as 'CntMissing'"))
                    ->where('bitIsApproved', '=', 1)
                    ->first();

        $counters = array('dogCount' => $dogC -> CntDog, 'strayCount' => $strayC -> CntStray, 'missingCount'=> $missingC -> CntMissing);
        $year = range (date('Y'), 2005);
        
    	return view('adminDashboard')->with($counters)->with('years', $year);
    }

    public function printDogAdoptionReport(Request $request){
        
        $month = $request -> input('month');
        $year = $request -> input('year');

        $dogAdoption = Db::table('adoptionrequesttbl')
                        ->join('doglisttbl', 'doglisttbl.intDogID', '=', 'adoptionrequesttbl.intDogID')
                        ->select('adoptionrequesttbl.strName', 'adoptionrequesttbl.strContact', 'adoptionrequesttbl.strEmail',
                                 'doglisttbl.strDogName', 'doglisttbl.dtAdoptionDate')
                        ->where('adoptionrequesttbl.bitCompleted', '=', 1)
                        ->whereMonth('dtAdoptionDate', '=', $month)
                        ->whereYear('dtAdoptionDate', '=', $year)
                        ->get();

        $strMonth;

        switch($month){
            case 1: $strMonth = "January";
                    break;
            case 2: $strMonth = "February";
                    break;
            case 3: $strMonth = "March";
                    break;
            case 4: $strMonth = "April";
                    break;
            case 5: $strMonth = "May";
                    break;
            case 6: $strMonth = "June";
                    break;
            case 7: $strMonth = "July";
                    break;
            case 8: $strMonth = "August";
                    break;
            case 9: $strMonth = "September";
                    break;
            case 10: $strMonth = "October";
                    break;
            case 11: $strMonth = "November";
                    break;
            case 12: $strMonth = "December";
                    break;  
        }

        $p = "  <!DOCTYPE html>
                <html>
                    <head>
                        <link rel='icon' href='../public/image/paw.ico'>
                        <link rel='stylesheet' href='../public/customer/css/bootstrap.css'>
                        <title>Dog Adoption Report</title>
                        <style>
                                #this h3{
                                        font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
                                }
                                #this h2{
                                        text-align: center;
                                }
                                #table th{
                                        text-align: center;
                                }
                                #table{
                                        margin: auto;
                                        font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
                                        border-collapse: collapse;
                                        width: 100%;
                                }
                                #table td{
                                        padding-left: 6;
                                        padding-right: 6;
                                }
                                #table #name{
                                        width: 20%;
                                }
                                #table #email{
                                        width: 20%;
                                }
                                
                        </style>
                    </head>
                    <body>
                        <div class='row'>
                            <div id='this'> 
                                <center><img src='..\public\image\smallbanner.png'></center>
                                <br>
                                <center><h3><strong> Dog Adoption Report For ".$strMonth." "."$year"." </strong></h3></center>
                                <br><br>           
                            </div>
                        </div>
                        <div>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th id='name'>Name</th>
                                    <th>Contact</th>
                                    <th id='email'>Email</th>
                                    <th>Dog Adopted</th>
                                    <th>Adoption Date</th>
                                </tr>
                            </thead>
                           <tbody>";

        $add = "";

        foreach($dogAdoption as $dList){
                if($dList){
                        $add .= "<tr>
                                <td>".$dList-> strName." </td>
                                <td>".$dList-> strContact." </td>
                                <td>".$dList-> strEmail." </td>
                                <td>".$dList-> strDogName." </td>
                                <td>".$dList-> dtAdoptionDate." </td>
                        </tr>";
                }else{
                        $add .= "<tr>
                                <td colspan = 6> No record found </td>
                        </tr>";  
                }
        }

        $p .= $add;
        $p.= "
                            </tbody>
                        /table>
                    </body> 
                </html>";
            
        $a = fopen("../print/dogAdoptionReport.html", 'w');
        fwrite($a, $p);
        fclose($a);
        chmod("../print/dogAdoptionReport.html", 0644);

        $dompdf =  new Dompdf();

        $dompdf->loadHtml($p);

        $dompdf ->  setPaper('letter', 'landscape');

        $dompdf->render();

        $dompdf -> stream("Dog Adoption Report", array("Attachment" => false));

        exit(0);

    }

    public function printStrayReport(Request $request){
        
        $month = $request -> input('month');
        $year = $request -> input('year');

        $strayReport = Db::table('strayreportstbl')
                        ->select('*')
                        ->where('bitResponded', '=', 1)
                        ->whereMonth('dtReportDate', '=', $month)
                        ->whereYear('dtReportDate', '=', $year)
                        ->get();

        $strMonth;

        switch($month){
            case 1: $strMonth = "January";
                    break;
            case 2: $strMonth = "February";
                    break;
            case 3: $strMonth = "March";
                    break;
            case 4: $strMonth = "April";
                    break;
            case 5: $strMonth = "May";
                    break;
            case 6: $strMonth = "June";
                    break;
            case 7: $strMonth = "July";
                    break;
            case 8: $strMonth = "August";
                    break;
            case 9: $strMonth = "September";
                    break;
            case 10: $strMonth = "October";
                    break;
            case 11: $strMonth = "November";
                    break;
            case 12: $strMonth = "December";
                    break;  
        }

        $p = "  <!DOCTYPE html>
                <html>
                    <head>
                        <link rel='icon' href=''../public/image/paw.ico'>
                        <link rel='stylesheet' href='../public/customer/css/bootstrap.css'>
                        <title>Stray Dogs Report</title>
                        <style>
                                #this h3{
                                        font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
                                }
                                #this h2{
                                    text-align: center;
                                }
                                #table th{
                                        text-align: center;
                                }
                                #table{
                                        margin: auto;
                                        font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
                                        border-collapse: collapse;
                                        width: 100%;
                                }
                                #table td{
                                        padding-left: 6;
                                        padding-right: 6;
                                }
                        </style>
                    </head>
                    <body>
                        <div class='row'>
                            <div id='this'> 
                                <center><img src='..\public\image\smallbanner.png'></center>
                                <br>
                                <center><h3><strong> Stray Dogs Report For ".$strMonth." "."$year"." </strong></h3></center>
                                <br><br>           
                            </div>
                        </div>
                        <div>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th>Reporter Name</th>
                                    <th>Reporter Email</th>
                                    <th>Location of Stray</th>
                                    <th>Stray Description</th>
                                    <th>Date Reported</th>
                                </tr>
                            </thead>
                           <tbody>";

        $add = "";

        foreach($strayReport as $dList){
            $add .= "<tr>
                        <td>".$dList-> strReporterName." </td>
                        <td>".$dList-> strReporterEmail." </td>
                        <td>".$dList-> strStreetName." ".$dList-> strBarangay." ". $dList-> strCity."</td>
                        <td>".$dList-> strDogDescription." </td>
                        <td>".$dList-> dtReportDate." </td>
                    </tr>";
        }

        $p .= $add;

        $p.= "
                            </tbody>
                        /table>
                    </body> 
                </html>";
            
        $a = fopen("../print/dogAdoptionReport.html", 'w');
        fwrite($a, $p);
        fclose($a);
        chmod("../print/dogAdoptionReport.html", 0644);

        $dompdf =  new Dompdf();

        $dompdf->loadHtml($p);

        $dompdf ->  setPaper('letter', 'landscape');

        $dompdf->render();

        $dompdf -> stream("Stray Report", array("Attachment" => false));

        exit(0);

    }

    public function printMissingReport(Request $request){
        
        $month = $request -> input('month');
        $year = $request -> input('year');

        $missingReport = Db::table('missingreportstbl')
                        ->select('*')
                        ->where('bitIsApproved', '=', 1)
                        ->whereMonth('dtFiledMissing', '=', $month)
                        ->whereYear('dtFiledMissing', '=', $year)
                        ->get();

        $strMonth;

        switch($month){
            case 1: $strMonth = "January";
                    break;
            case 2: $strMonth = "February";
                    break;
            case 3: $strMonth = "March";
                    break;
            case 4: $strMonth = "April";
                    break;
            case 5: $strMonth = "May";
                    break;
            case 6: $strMonth = "June";
                    break;
            case 7: $strMonth = "July";
                    break;
            case 8: $strMonth = "August";
                    break;
            case 9: $strMonth = "September";
                    break;
            case 10: $strMonth = "October";
                    break;
            case 11: $strMonth = "November";
                    break;
            case 12: $strMonth = "December";
                    break;  
        }

        $p = "  <!DOCTYPE html>
                <html>
                    <head>
                        <link rel='icon' href=''../public/image/paw.ico'>
                        <link rel='stylesheet' href='../public/customer/css/bootstrap.css'>
                        <title>Missing Pets Report</title>
                        <style>
                                #this h3{
                                        font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
                                }
                                #this h2{
                                    text-align: center;
                                }
                                #table th{
                                        text-align: center;
                                }
                                #table{
                                        margin: auto;
                                        font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
                                        border-collapse: collapse;
                                        width: 100%;
                                }
                                #table td{
                                        padding-left: 6;
                                        padding-right: 6;
                                }
                                #table #reporter{
                                        width: 20%;
                                }
                        </style>
                    </head>
                    <body>
                        <div class='row'>
                            <div id='this'> 
                                <center><img src='..\public\image\smallbanner.png'></center>
                                <br>
                                <center><h3><strong> Missing Pets Report For ".$strMonth." "."$year"." </strong></h3></center>
                                <br><br>           
                            </div>
                        </div>
                        <div>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th id='reporter'>Reporter Name</th>
                                    <th>Reporter Email</th>
                                    <th>Reporter Contact</th>
                                    <th>Missing Dog Name</th>
                                    <th>Dog Description</th>
                                    <th>Date Filed Missing</th>
                                </tr>
                            </thead>
                           <tbody>";

        $add = "";

        foreach($missingReport as $dList){
            $add .= "<tr>
                        <td>".$dList-> strReporterName." </td>
                        <td>".$dList-> strReporterEmail." </td>
                        <td>".$dList-> strReporterContactNo." </td>
                        <td>".$dList-> strDogName." </td>
                        <td>".$dList-> strDogDescription." </td>
                        <td>".$dList-> dtFiledMissing." </td>
                    </tr>";
        }

        $p .= $add;

        $p.= "
                            </tbody>
                        /table>
                    </body> 
                </html>";
            
        $a = fopen("../print/dogAdoptionReport.html", 'w');
        fwrite($a, $p);
        fclose($a);
        chmod("../print/dogAdoptionReport.html", 0644);

        $dompdf =  new Dompdf();

        $dompdf->loadHtml($p);

        $dompdf ->  setPaper('letter', 'landscape');

        $dompdf->render();

        $dompdf -> stream("Missing Dog Report", array("Attachment" => false));

        exit(0);

    }
}
