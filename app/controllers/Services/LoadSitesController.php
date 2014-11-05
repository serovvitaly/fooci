<?php
/**
 * Created by PhpStorm.
 * User: Anderson
 * Date: 01.11.2014
 * Time: 23:05
 */

namespace Controllers\Services;

class LoadSitesController extends \Controller {

    public function getIndex()
    {
        return ['Access denied'];

        $file = \Input::get('file');

        if (!$file) {
            return ['error' => 'Файл не указан'];
        }

        $file_path = base_path() . '/' . $file;

        $handle = @fopen($file_path, "r");

        if (!$handle) {
            return ['error' => 'Невозможно прочитать файл'];
        }

        while (($buffer = fgets($handle, 4096)) !== false) {
            $row = explode('	', str_replace("\r\n", '', $buffer));

            $site = new \Site;

            $site->domain             = $row[0];
            $site->registrar          = $row[1];
            $site->free_date          = $row[2];
            $site->may_be_released    = $row[3];
            $site->created_in         = $row[4];
            $site->other_tlds         = $row[5];
            $site->google_pr          = $row[6];
            $site->yandex_tci         = $row[7];
            $site->alexa_traffic_rank = $row[8];
            $site->web_archive        = $row[9];

            $site->save();
        }
        if (!feof($handle)) {
            return ['error' => 'Ошибка чтения файла'];
        }
        fclose($handle);


        return ['file' => $file_path];
    }

    public function getWhois()
    {
        return;

        $sites = \DB::select(\DB::raw("SELECT s.id, s.domain FROM sites s WHERE s.id NOT IN(SELECT c.site FROM checklist c WHERE c.parameter = 'whois' GROUP BY c.site) LIMIT 400"));

        if (empty($sites)) {
            return;
        }

        foreach ($sites as $site) {

            $whois = new \PhpWhois\Whois($site->domain);
            $result = $whois->lookup();

            $mix = explode("\n", $result);

            if (count($mix) < 10) {
                $mix = null;
            }

            if ($mix) {
                $mix = array_splice($mix, 2);
            }

            $checklist = new \Checklist;
            $checklist->site = $site->id;
            $checklist->parameter = 'whois';
            $checklist->result = $mix ? implode("\n", $mix) : 'ERROR';

            $checklist->save();
        }
    }

    public function getCheckTicAndPr()
    {
        $sites = \DB::select(\DB::raw("SELECT s.id, s.domain FROM sites s WHERE s.id NOT IN(SELECT c.site FROM checklist c WHERE c.parameter = 'tic_pr_dirtydata' GROUP BY c.site) LIMIT 10"));

        if (empty($sites)) {
            return;
        }

        foreach ($sites as $site) {

            $result = @file_get_contents('http://gogolev.net/tools/webmaster/enter.php?q=http://' . strtolower($site->domain));

            $checklist = new \Checklist;
            $checklist->site = $site->id;
            $checklist->parameter = 'tic_pr_dirtydata';
            $checklist->result = $result ? trim($result) : 'ERROR';

            $checklist->save();

            sleep(5);
        }
    }

    public function getCheckYandexMirror()
    {
        $client = new \fXmlRpc\Client('http://seobudget.ru/api');
        $auth_result = $client->call('seobudget.login', array('serovvitaly', 'Serov1'));

        return $auth_result;
    }

} 