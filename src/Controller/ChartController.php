<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChartController extends AbstractController
{
    #[Route('/chart', name: 'app_chart')]
    public function index(): Response
    {


        $dane1=10000;    
        $dane2=10000;
        $dane3=0.05;
        $dane4=0.05;

        $belka = 0.81;
        $k1 = $dane1;
        $k2 = 0;
        $k3 = 0;
        $k4 = 0;
        $k5 = 0;
        $k6 = 0;
        $k7 = 0;
        $k8 = 0;
        $k9 = 0;
        $k10 = 0;

        $tablicak1 = array();
        $tablicak2 = array();
        $tablicak3 = array();
        $tablicak4 = array();
        $tablicak5 = array();
        $tablicak6 = array();
        $tablicak7 = array();
        $tablicak8 = array();
        $tablicak9 = array();
        $tablicak10 = array();

        for ($i = 1; $i <= 40; $i++) {
            if ($i == 1) {
                $tablicak1[$i] = $dane1;
                $tablicak2[$i] = (1 + ($dane3 / 100)) * $tablicak1[$i];
                $tablicak8[$i] = $tablicak1[$i] * ($dane3 / 100);
            } else {
                $tablicak1[$i] = $tablicak1[$i - 1] + $dane2;
                $tablicak2[$i] = ($tablicak2[$i - 1] + $dane2) * (1 + ($dane3 / 100));
                $tablicak8[$i] = ($tablicak1[$i] + $tablicak3[$i - 1]) * ($dane3 / 100);
            }
            $tablicak3[$i] = $tablicak2[$i] - $tablicak1[$i];
            $tablicak4[$i] = $tablicak3[$i] * $belka;
            $tablicak5[$i] = $tablicak1[$i] + $tablicak4[$i];
            $tablicak6[$i] = $tablicak3[$i] - $tablicak4[$i];
            $tablicak7[$i] = $tablicak3[$i] / 12;
            $tablicak9[$i] = $tablicak2[$i] * (pow((1 - ($dane4 / 100)), $i));
            $tablicak10[$i] = ($tablicak1[$i] + ($tablicak3[$i] * $belka)) * pow((1 - ($dane4 / 100)), $i);
        }


        $dataPoints1=array();
        $dataPoints2=array();
        $dataPoints3=array();
        $dataPoints4=array();
        
        // for($i = 0; $i<40; $i++)
        // { 
        //     $dataPoints1[$i]=array("label"=> $i+1 , "y"=> $tablicak1[$i+1]);
        //     $dataPoints2[$i]=array("label"=> $i+1 , "y"=> $tablicak2[$i+1]);
        //     $dataPoints3[$i]=array("label"=> $i+1 , "y"=> $tablicak5[$i+1]);
        //     $dataPoints4[$i]=array("label"=> $i+1 , "y"=> $tablicak9[$i+1]);
        // }

        // dd($tablicak1);

        return $this->render('chart/index.html.twig', [
            'controller_name' => 'ChartController',
            '$tablicak1' => 'dataPoints1',
            '$tablicak2' => 'dataPoints2',
            '$tablicak5' => 'dataPoints3',
            '$tablicak9' => 'dataPoints4',
        ]);
    }
}
