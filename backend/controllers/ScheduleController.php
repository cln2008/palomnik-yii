<?php

namespace backend\controllers;

use kartik\mpdf\Pdf;
use Yii;
use app\models\Pages;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use frontend\models\Schedule;
use frontend\models\Common;
use mPDF;
// use kartik\mpdf\Pdf;


class ScheduleController extends Controller{

    // отображает список доступных расписаний
    public function actionList(){

        $this->layout = 'start';
        $schedules = Schedule::find()->select(['sch_year', 'sch_month'])->distinct()->all();

        foreach($schedules as $schedule){
            $sch[] = [
                       'sch_year' => $schedule->sch_year
                     , 'sch_month' => $schedule->sch_month
                     , 'month_name' => Common::getMonthName1($schedule->sch_month)
                     ];
        }


        return $this->render('list', compact('sch'));
    }

    public function actionSample() {

        // $mpdf = new mPDF;
        $mpdf = new mPDF('utf-8', 'A4-L');
        // $mpdf = new Pdf(['orientation' => Pdf::ORIENT_PORTRAIT,]);
        // $mpdf->WriteHTML('Sample Text');
        $mpdf->WriteHTML($this->renderPartial('_pdf'));

        $mpdf->Output();
        exit;

    }

    public function actionSform($month, $year) {
        $schedule = Schedule::find()
                            ->where(['sch_month' => $month, 'sch_year' => $year])
                            ->with('events')
                            ->orderBy('sch_day')
                            ->all();

        $this->layout = 'start';
        return $this->render('sform', compact('schedule'));


    }

    public function actionSpdf($month, $year){
        $schedule = Schedule::find()
            ->where(['sch_month' => $month, 'sch_year' => $year])
            ->with('events')
            ->orderBy('sch_day')
            ->all();

        // $mpdf = new mPDF('utf-8', 'A4-L');
        $mpdf = new mPDF('','A4-L', 10, '', 15, 15, 5, 5, 9, 9, 'P');
        $mpdf->WriteHTML($this->renderPartial('sform', compact('schedule')));

        $mpdf->Output('filename.pdf','D');
        exit;
    }

    public function actionCreate(){
        $this->layout = 'start';
        return $this->render('createSchedule');
    }

}