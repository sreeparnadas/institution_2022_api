<?php

namespace Database\Seeders;




use App\Models\Chapter;
use App\Models\QuestionLevel;
use App\Models\FeesModeType;
use App\Models\Ledger;
use App\Models\LedgerGroup;
use App\Models\QuestionType;
use App\Models\Subject;
use App\Models\TransactionType;
use App\Models\VoucherType;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserType;
use App\Models\State;
use App\Models\Course;
use App\Models\District;
use App\Models\DurationType;
use App\Models\StudentCourseRegistration;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Adding user type');
        // \App\Models\User::factory(10)->create();
        //person_types table data
        UserType::create(['user_type_name' => 'Owner']);            #1
        UserType::create(['user_type_name' => 'Developer']);        #2
        UserType::create(['user_type_name' => 'Admin']);            #3
        UserType::create(['user_type_name' => 'Manager']);          #4
        UserType::create(['user_type_name' => 'Worker']);           #5
        UserType::create(['user_type_name' => 'Accountant']);       #6
        UserType::create(['user_type_name' => 'Office Staff']);     #7
        UserType::create(['user_type_name' => 'Student']);          #8


        //owner
        User::create(['user_name'=>'Tanusree Hui','mobile1'=>'9836444999','mobile2'=>'100'
        ,'email'=>'owner','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>1]);

        //developer
        User::create(['user_name'=>'Sukanta Hui','mobile1'=>'9836444999','mobile2'=>'101'
            ,'email'=>'developer','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>2]);

        //admin
        User::create(['user_name'=>'Sreeparna Das','mobile1'=>'9836444999','mobile2'=>'102'
            ,'email'=>'admin','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>3]);

        //student
        User::create(['user_name'=>'Coder Student','mobile1'=>'9836444999','mobile2'=>'108'
            ,'email'=>'student','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>8]);

        //storing state
        State::insert([
            ['state_code'=>0,'state_name'=>'Not applicable'],
            ['state_code'=>1,'state_name'=>'Jammu & Kashmir'],
            ['state_code'=>2,'state_name'=>'Himachal Pradesh'],
            ['state_code'=>3,'state_name'=>'Punjab'],
            ['state_code'=>4,'state_name'=>'Chandigarh'],
            ['state_code'=>5,'state_name'=>'Uttranchal'],
            ['state_code'=>6,'state_name'=>'Haryana'],
            ['state_code'=>7,'state_name'=>'Delhi'],
            ['state_code'=>8,'state_name'=>'Rajasthan'],
            ['state_code'=>9,'state_name'=>'Uttar Pradesh'],
            ['state_code'=>10,'state_name'=>'Bihar'],
            ['state_code'=>11,'state_name'=>'Sikkim'],
            ['state_code'=>12,'state_name'=>'Arunachal Pradesh'],
            ['state_code'=>13,'state_name'=>'Nagaland'],
            ['state_code'=>14,'state_name'=>'Manipur'],
            ['state_code'=>15,'state_name'=>'Mizoram'],
            ['state_code'=>16,'state_name'=>'Tripura'],
            ['state_code'=>17,'state_name'=>'Meghalaya'],
            ['state_code'=>18,'state_name'=>'Assam'],
            ['state_code'=>19,'state_name'=>'West Bengal'],
            ['state_code'=>20,'state_name'=>'Jharkhand'],
            ['state_code'=>21,'state_name'=>'Odisha (Formerly Orissa'],
            ['state_code'=>22,'state_name'=>'Chhattisgarh'],
            ['state_code'=>23,'state_name'=>'Madhya Pradesh'],
            ['state_code'=>24,'state_name'=>'Gujarat'],
            ['state_code'=>25,'state_name'=>'Daman & Diu'],
            ['state_code'=>26,'state_name'=>'Dadra & Nagar Haveli'],
            ['state_code'=>27,'state_name'=>'Maharashtra'],
            ['state_code'=>28,'state_name'=>'Andhra Pradesh'],
            ['state_code'=>29,'state_name'=>'Karnataka'],
            ['state_code'=>30,'state_name'=>'Goa'],
            ['state_code'=>31,'state_name'=>'Lakshdweep'],
            ['state_code'=>32,'state_name'=>'Kerala'],
            ['state_code'=>33,'state_name'=>'Tamil Nadu'],
            ['state_code'=>34,'state_name'=>'Pondicherry'],
            ['state_code'=>35,'state_name'=>'Andaman & Nicobar Islands'],
            ['state_code'=>36,'state_name'=>'Telangana'],
            ['state_code'=>37,'state_name'=>'Ladak']
        ]);
        District::insert([
            ['state_id'=>2,'district_name'=>'Anantnag'],
            ['state_id'=>2,'district_name'=>'Bandipora'],
            ['state_id'=>2,'district_name'=>'Baramulla'],
            ['state_id'=>2,'district_name'=>'Budgam'],
            ['state_id'=>2,'district_name'=>'Doda'],
            ['state_id'=>2,'district_name'=>'Ganderbal'],
            ['state_id'=>2,'district_name'=>'Jammu'],
            ['state_id'=>2,'district_name'=>'Kathua'],
            ['state_id'=>2,'district_name'=>'Kishtwar'],
            ['state_id'=>2,'district_name'=>'Kulgam'],
            ['state_id'=>2,'district_name'=>'Kupwara'],
            ['state_id'=>2,'district_name'=>'Poonch'],
            ['state_id'=>2,'district_name'=>'Pulwama'],
            ['state_id'=>2,'district_name'=>'Rajouri'],
            ['state_id'=>2,'district_name'=>'Ramban'],
            ['state_id'=>2,'district_name'=>'Reasi'],
            ['state_id'=>2,'district_name'=>'Samba'],
            ['state_id'=>2,'district_name'=>'Shopian'],
            ['state_id'=>2,'district_name'=>'Srinagar'],
            ['state_id'=>2,'district_name'=>'Udhampur'],
            ['state_id'=>3,'district_name'=>'Bilaspur'],
            ['state_id'=>3,'district_name'=>'Chamba'],
            ['state_id'=>3,'district_name'=>'Hamirpur'],
            ['state_id'=>3,'district_name'=>'Kangra'],
            ['state_id'=>3,'district_name'=>'Kinnaur'],
            ['state_id'=>3,'district_name'=>'Kullu'],
            ['state_id'=>3,'district_name'=>'Lahaul Spiti'],
            ['state_id'=>3,'district_name'=>'Mandi'],
            ['state_id'=>3,'district_name'=>'Shimla'],
            ['state_id'=>3,'district_name'=>'Sirmaur'],
            ['state_id'=>3,'district_name'=>'Solan'],
            ['state_id'=>3,'district_name'=>'Una'],
            ['state_id'=>4,'district_name'=>'Amritsar'],
            ['state_id'=>4,'district_name'=>'Barnala'],
            ['state_id'=>4,'district_name'=>'Bathinda'],
            ['state_id'=>4,'district_name'=>'Faridkot'],
            ['state_id'=>4,'district_name'=>'Fatehgarh Sahib'],
            ['state_id'=>4,'district_name'=>'Fazilka'],
            ['state_id'=>4,'district_name'=>'Firozpur'],
            ['state_id'=>4,'district_name'=>'Gurdaspur'],
            ['state_id'=>4,'district_name'=>'Hoshiarpur'],
            ['state_id'=>4,'district_name'=>'Jalandhar'],
            ['state_id'=>4,'district_name'=>'Kapurthala'],
            ['state_id'=>4,'district_name'=>'Ludhiana'],
            ['state_id'=>4,'district_name'=>'Malerkotla'],
            ['state_id'=>4,'district_name'=>'Mansa'],
            ['state_id'=>4,'district_name'=>'Moga'],
            ['state_id'=>4,'district_name'=>'Mohali'],
            ['state_id'=>4,'district_name'=>'Muktsar'],
            ['state_id'=>4,'district_name'=>'Pathankot'],
            ['state_id'=>4,'district_name'=>'Patiala'],
            ['state_id'=>4,'district_name'=>'Rupnagar'],
            ['state_id'=>4,'district_name'=>'Sangrur'],
            ['state_id'=>4,'district_name'=>'Shaheed Bhagat Singh Nagar'],
            ['state_id'=>4,'district_name'=>'Tarn Taran'],
            ['state_id'=>5,'district_name'=>'Chandigarh'],
            ['state_id'=>6,'district_name'=>'Almora'],
            ['state_id'=>6,'district_name'=>'Bageshwar'],
            ['state_id'=>6,'district_name'=>'Chamoli'],
            ['state_id'=>6,'district_name'=>'Champawat'],
            ['state_id'=>6,'district_name'=>'Dehradun'],
            ['state_id'=>6,'district_name'=>'Haridwar'],
            ['state_id'=>6,'district_name'=>'Nainital'],
            ['state_id'=>6,'district_name'=>'Pauri'],
            ['state_id'=>6,'district_name'=>'Pithoragarh'],
            ['state_id'=>6,'district_name'=>'Rudraprayag'],
            ['state_id'=>6,'district_name'=>'Tehri'],
            ['state_id'=>6,'district_name'=>'Udham Singh Nagar'],
            ['state_id'=>6,'district_name'=>'Uttarkashi'],
            ['state_id'=>7,'district_name'=>'Ambala'],
            ['state_id'=>7,'district_name'=>'Bhiwani'],
            ['state_id'=>7,'district_name'=>'Charkhi Dadri'],
            ['state_id'=>7,'district_name'=>'Faridabad'],
            ['state_id'=>7,'district_name'=>'Fatehabad'],
            ['state_id'=>7,'district_name'=>'Gurugram'],
            ['state_id'=>7,'district_name'=>'Hisar'],
            ['state_id'=>7,'district_name'=>'Jhajjar'],
            ['state_id'=>7,'district_name'=>'Jind'],
            ['state_id'=>7,'district_name'=>'Kaithal'],
            ['state_id'=>7,'district_name'=>'Karnal'],
            ['state_id'=>7,'district_name'=>'Kurukshetra'],
            ['state_id'=>7,'district_name'=>'Mahendragarh'],
            ['state_id'=>7,'district_name'=>'Mewat'],
            ['state_id'=>7,'district_name'=>'Palwal'],
            ['state_id'=>7,'district_name'=>'Panchkula'],
            ['state_id'=>7,'district_name'=>'Panipat'],
            ['state_id'=>7,'district_name'=>'Rewari'],
            ['state_id'=>7,'district_name'=>'Rohtak'],
            ['state_id'=>7,'district_name'=>'Sirsa'],
            ['state_id'=>7,'district_name'=>'Sonipat'],
            ['state_id'=>7,'district_name'=>'Yamunanagar'],
            ['state_id'=>8,'district_name'=>'Central Delhi'],
            ['state_id'=>8,'district_name'=>'East Delhi'],
            ['state_id'=>8,'district_name'=>'New Delhi'],
            ['state_id'=>8,'district_name'=>'North Delhi'],
            ['state_id'=>8,'district_name'=>'North East Delhi'],
            ['state_id'=>8,'district_name'=>'North West Delhi'],
            ['state_id'=>8,'district_name'=>'Shahdara'],
            ['state_id'=>8,'district_name'=>'South Delhi'],
            ['state_id'=>8,'district_name'=>'South East Delhi'],
            ['state_id'=>8,'district_name'=>'South West Delhi'],
            ['state_id'=>8,'district_name'=>'West Delhi'],
            ['state_id'=>9,'district_name'=>'Ajmer'],
            ['state_id'=>9,'district_name'=>'Alwar'],
            ['state_id'=>9,'district_name'=>'Banswara'],
            ['state_id'=>9,'district_name'=>'Baran'],
            ['state_id'=>9,'district_name'=>'Barmer'],
            ['state_id'=>9,'district_name'=>'Bharatpur'],
            ['state_id'=>9,'district_name'=>'Bhilwara'],
            ['state_id'=>9,'district_name'=>'Bikaner'],
            ['state_id'=>9,'district_name'=>'Bundi'],
            ['state_id'=>9,'district_name'=>'Chittorgarh'],
            ['state_id'=>9,'district_name'=>'Churu'],
            ['state_id'=>9,'district_name'=>'Dausa'],
            ['state_id'=>9,'district_name'=>'Dholpur'],
            ['state_id'=>9,'district_name'=>'Dungarpur'],
            ['state_id'=>9,'district_name'=>'Hanumangarh'],
            ['state_id'=>9,'district_name'=>'Jaipur'],
            ['state_id'=>9,'district_name'=>'Jaisalmer'],
            ['state_id'=>9,'district_name'=>'Jalore'],
            ['state_id'=>9,'district_name'=>'Jhalawar'],
            ['state_id'=>9,'district_name'=>'Jhunjhunu'],
            ['state_id'=>9,'district_name'=>'Jodhpur'],
            ['state_id'=>9,'district_name'=>'Karauli'],
            ['state_id'=>9,'district_name'=>'Kota'],
            ['state_id'=>9,'district_name'=>'Nagaur'],
            ['state_id'=>9,'district_name'=>'Pali'],
            ['state_id'=>9,'district_name'=>'Pratapgarh'],
            ['state_id'=>9,'district_name'=>'Rajsamand'],
            ['state_id'=>9,'district_name'=>'Sawai Madhopur'],
            ['state_id'=>9,'district_name'=>'Sikar'],
            ['state_id'=>9,'district_name'=>'Sirohi'],
            ['state_id'=>9,'district_name'=>'Sri Ganganagar'],
            ['state_id'=>9,'district_name'=>'Tonk'],
            ['state_id'=>9,'district_name'=>'Udaipur'],
            ['state_id'=>10,'district_name'=>'Agra'],
            ['state_id'=>10,'district_name'=>'Aligarh'],
            ['state_id'=>10,'district_name'=>'Ambedkar Nagar'],
            ['state_id'=>10,'district_name'=>'Amethi'],
            ['state_id'=>10,'district_name'=>'Amroha'],
            ['state_id'=>10,'district_name'=>'Auraiya'],
            ['state_id'=>10,'district_name'=>'Ayodhya'],
            ['state_id'=>10,'district_name'=>'Azamgarh'],
            ['state_id'=>10,'district_name'=>'Baghpat'],
            ['state_id'=>10,'district_name'=>'Bahraich'],
            ['state_id'=>10,'district_name'=>'Ballia'],
            ['state_id'=>10,'district_name'=>'Balrampur'],
            ['state_id'=>10,'district_name'=>'Banda'],
            ['state_id'=>10,'district_name'=>'Barabanki'],
            ['state_id'=>10,'district_name'=>'Bareilly'],
            ['state_id'=>10,'district_name'=>'Basti'],
            ['state_id'=>10,'district_name'=>'Bhadohi'],
            ['state_id'=>10,'district_name'=>'Bijnor'],
            ['state_id'=>10,'district_name'=>'Budaun'],
            ['state_id'=>10,'district_name'=>'Bulandshahr'],
            ['state_id'=>10,'district_name'=>'Chandauli'],
            ['state_id'=>10,'district_name'=>'Chitrakoot'],
            ['state_id'=>10,'district_name'=>'Deoria'],
            ['state_id'=>10,'district_name'=>'Etah'],
            ['state_id'=>10,'district_name'=>'Etawah'],
            ['state_id'=>10,'district_name'=>'Farrukhabad'],
            ['state_id'=>10,'district_name'=>'Fatehpur'],
            ['state_id'=>10,'district_name'=>'Firozabad'],
            ['state_id'=>10,'district_name'=>'Gautam Buddha Nagar'],
            ['state_id'=>10,'district_name'=>'Ghaziabad'],
            ['state_id'=>10,'district_name'=>'Ghazipur'],
            ['state_id'=>10,'district_name'=>'Gonda'],
            ['state_id'=>10,'district_name'=>'Gorakhpur'],
            ['state_id'=>10,'district_name'=>'Hamirpur'],
            ['state_id'=>10,'district_name'=>'Hapur'],
            ['state_id'=>10,'district_name'=>'Hardoi'],
            ['state_id'=>10,'district_name'=>'Hathras'],
            ['state_id'=>10,'district_name'=>'Jalaun'],
            ['state_id'=>10,'district_name'=>'Jaunpur'],
            ['state_id'=>10,'district_name'=>'Jhansi'],
            ['state_id'=>10,'district_name'=>'Kannauj'],
            ['state_id'=>10,'district_name'=>'Kanpur Dehat'],
            ['state_id'=>10,'district_name'=>'Kanpur Nagar'],
            ['state_id'=>10,'district_name'=>'Kasganj'],
            ['state_id'=>10,'district_name'=>'Kaushambi'],
            ['state_id'=>10,'district_name'=>'Kheri'],
            ['state_id'=>10,'district_name'=>'Kushinagar'],
            ['state_id'=>10,'district_name'=>'Lalitpur'],
            ['state_id'=>10,'district_name'=>'Lucknow'],
            ['state_id'=>10,'district_name'=>'Maharajganj'],
            ['state_id'=>10,'district_name'=>'Mahoba'],
            ['state_id'=>10,'district_name'=>'Mainpuri'],
            ['state_id'=>10,'district_name'=>'Mathura'],
            ['state_id'=>10,'district_name'=>'Mau'],
            ['state_id'=>10,'district_name'=>'Meerut'],
            ['state_id'=>10,'district_name'=>'Mirzapur'],
            ['state_id'=>10,'district_name'=>'Moradabad'],
            ['state_id'=>10,'district_name'=>'Muzaffarnagar'],
            ['state_id'=>10,'district_name'=>'Pilibhit'],
            ['state_id'=>10,'district_name'=>'Pratapgarh'],
            ['state_id'=>10,'district_name'=>'Prayagraj'],
            ['state_id'=>10,'district_name'=>'Raebareli'],
            ['state_id'=>10,'district_name'=>'Rampur'],
            ['state_id'=>10,'district_name'=>'Saharanpur'],
            ['state_id'=>10,'district_name'=>'Sambhal'],
            ['state_id'=>10,'district_name'=>'Sant Kabir Nagar'],
            ['state_id'=>10,'district_name'=>'Shahjahanpur'],
            ['state_id'=>10,'district_name'=>'Shamli'],
            ['state_id'=>10,'district_name'=>'Shravasti'],
            ['state_id'=>10,'district_name'=>'Siddharthnagar'],
            ['state_id'=>10,'district_name'=>'Sitapur'],
            ['state_id'=>10,'district_name'=>'Sonbhadra'],
            ['state_id'=>10,'district_name'=>'Sultanpur'],
            ['state_id'=>10,'district_name'=>'Unnao'],
            ['state_id'=>10,'district_name'=>'Varanasi'],
            ['state_id'=>11,'district_name'=>'Araria'],
            ['state_id'=>11,'district_name'=>'Arwal'],
            ['state_id'=>11,'district_name'=>'Aurangabad'],
            ['state_id'=>11,'district_name'=>'Banka'],
            ['state_id'=>11,'district_name'=>'Begusarai'],
            ['state_id'=>11,'district_name'=>'Bhagalpur'],
            ['state_id'=>11,'district_name'=>'Bhojpur'],
            ['state_id'=>11,'district_name'=>'Buxar'],
            ['state_id'=>11,'district_name'=>'Darbhanga'],
            ['state_id'=>11,'district_name'=>'East Champaran'],
            ['state_id'=>11,'district_name'=>'Gaya'],
            ['state_id'=>11,'district_name'=>'Gopalganj'],
            ['state_id'=>11,'district_name'=>'Jamui'],
            ['state_id'=>11,'district_name'=>'Jehanabad'],
            ['state_id'=>11,'district_name'=>'Kaimur'],
            ['state_id'=>11,'district_name'=>'Katihar'],
            ['state_id'=>11,'district_name'=>'Khagaria'],
            ['state_id'=>11,'district_name'=>'Kishanganj'],
            ['state_id'=>11,'district_name'=>'Lakhisarai'],
            ['state_id'=>11,'district_name'=>'Madhepura'],
            ['state_id'=>11,'district_name'=>'Madhubani'],
            ['state_id'=>11,'district_name'=>'Munger'],
            ['state_id'=>11,'district_name'=>'Muzaffarpur'],
            ['state_id'=>11,'district_name'=>'Nalanda'],
            ['state_id'=>11,'district_name'=>'Nawada'],
            ['state_id'=>11,'district_name'=>'Patna'],
            ['state_id'=>11,'district_name'=>'Purnia'],
            ['state_id'=>11,'district_name'=>'Rohtas'],
            ['state_id'=>11,'district_name'=>'Saharsa'],
            ['state_id'=>11,'district_name'=>'Samastipur'],
            ['state_id'=>11,'district_name'=>'Saran'],
            ['state_id'=>11,'district_name'=>'Sheikhpura'],
            ['state_id'=>11,'district_name'=>'Sheohar'],
            ['state_id'=>11,'district_name'=>'Sitamarhi'],
            ['state_id'=>11,'district_name'=>'Siwan'],
            ['state_id'=>11,'district_name'=>'Supaul'],
            ['state_id'=>11,'district_name'=>'Vaishali'],
            ['state_id'=>11,'district_name'=>'West Champaran'],
            ['state_id'=>12,'district_name'=>'East Sikkim'],
            ['state_id'=>12,'district_name'=>'North Sikkim'],
            ['state_id'=>12,'district_name'=>'South Sikkim'],
            ['state_id'=>12,'district_name'=>'West Sikkim'],
            ['state_id'=>13,'district_name'=>'Anjaw'],
            ['state_id'=>13,'district_name'=>'Central Siang'],
            ['state_id'=>13,'district_name'=>'Changlang'],
            ['state_id'=>13,'district_name'=>'Dibang Valley'],
            ['state_id'=>13,'district_name'=>'East Kameng'],
            ['state_id'=>13,'district_name'=>'East Siang'],
            ['state_id'=>13,'district_name'=>'Kamle'],
            ['state_id'=>13,'district_name'=>'Kra Daadi'],
            ['state_id'=>13,'district_name'=>'Kurung Kumey'],
            ['state_id'=>13,'district_name'=>'Lepa Rada'],
            ['state_id'=>13,'district_name'=>'Lohit'],
            ['state_id'=>13,'district_name'=>'Longding'],
            ['state_id'=>13,'district_name'=>'Lower Dibang Valley'],
            ['state_id'=>13,'district_name'=>'Lower Siang'],
            ['state_id'=>13,'district_name'=>'Lower Subansiri'],
            ['state_id'=>13,'district_name'=>'Namsai'],
            ['state_id'=>13,'district_name'=>'Pakke Kessang'],
            ['state_id'=>13,'district_name'=>'Papum Pare'],
            ['state_id'=>13,'district_name'=>'Shi Yomi'],
            ['state_id'=>13,'district_name'=>'Tawang'],
            ['state_id'=>13,'district_name'=>'Tirap'],
            ['state_id'=>13,'district_name'=>'Upper Siang'],
            ['state_id'=>13,'district_name'=>'Upper Subansiri'],
            ['state_id'=>13,'district_name'=>'West Kameng'],
            ['state_id'=>13,'district_name'=>'West Siang'],
            ['state_id'=>14,'district_name'=>'Chumukedima'],
            ['state_id'=>14,'district_name'=>'Dimapur'],
            ['state_id'=>14,'district_name'=>'Kiphire'],
            ['state_id'=>14,'district_name'=>'Kohima'],
            ['state_id'=>14,'district_name'=>'Longleng'],
            ['state_id'=>14,'district_name'=>'Mokokchung'],
            ['state_id'=>14,'district_name'=>'Mon'],
            ['state_id'=>14,'district_name'=>'Niuland'],
            ['state_id'=>14,'district_name'=>'Noklak'],
            ['state_id'=>14,'district_name'=>'Peren'],
            ['state_id'=>14,'district_name'=>'Phek'],
            ['state_id'=>14,'district_name'=>'Tseminyu'],
            ['state_id'=>14,'district_name'=>'Tuensang'],
            ['state_id'=>14,'district_name'=>'Wokha'],
            ['state_id'=>14,'district_name'=>'Zunheboto'],
            ['state_id'=>15,'district_name'=>'Bishnupur'],
            ['state_id'=>15,'district_name'=>'Chandel'],
            ['state_id'=>15,'district_name'=>'Churachandpur'],
            ['state_id'=>15,'district_name'=>'Imphal East'],
            ['state_id'=>15,'district_name'=>'Imphal West'],
            ['state_id'=>15,'district_name'=>'Jiribam'],
            ['state_id'=>15,'district_name'=>'Kakching'],
            ['state_id'=>15,'district_name'=>'Kamjong'],
            ['state_id'=>15,'district_name'=>'Kangpokpi'],
            ['state_id'=>15,'district_name'=>'Noney'],
            ['state_id'=>15,'district_name'=>'Pherzawl'],
            ['state_id'=>15,'district_name'=>'Senapati'],
            ['state_id'=>15,'district_name'=>'Tamenglong'],
            ['state_id'=>15,'district_name'=>'Tengnoupal'],
            ['state_id'=>15,'district_name'=>'Thoubal'],
            ['state_id'=>15,'district_name'=>'Ukhrul'],
            ['state_id'=>16,'district_name'=>'Aizawl'],
            ['state_id'=>16,'district_name'=>'Champhai'],
            ['state_id'=>16,'district_name'=>'Hnahthial'],
            ['state_id'=>16,'district_name'=>'Khawzawl'],
            ['state_id'=>16,'district_name'=>'Kolasib'],
            ['state_id'=>16,'district_name'=>'Lawngtlai'],
            ['state_id'=>16,'district_name'=>'Lunglei'],
            ['state_id'=>16,'district_name'=>'Mamit'],
            ['state_id'=>16,'district_name'=>'Saiha'],
            ['state_id'=>16,'district_name'=>'Saitual'],
            ['state_id'=>16,'district_name'=>'Serchhip'],
            ['state_id'=>17,'district_name'=>'Dhalai'],
            ['state_id'=>17,'district_name'=>'Gomati'],
            ['state_id'=>17,'district_name'=>'Khowai'],
            ['state_id'=>17,'district_name'=>'North Tripura'],
            ['state_id'=>17,'district_name'=>'Sepahijala'],
            ['state_id'=>17,'district_name'=>'South Tripura'],
            ['state_id'=>17,'district_name'=>'Unakoti'],
            ['state_id'=>17,'district_name'=>'West Tripura'],
            ['state_id'=>18,'district_name'=>'East Garo Hills'],
            ['state_id'=>18,'district_name'=>'East Jaintia Hills'],
            ['state_id'=>18,'district_name'=>'East Khasi Hills'],
            ['state_id'=>18,'district_name'=>'Mairang'],
            ['state_id'=>18,'district_name'=>'North Garo Hills'],
            ['state_id'=>18,'district_name'=>'Ri Bhoi'],
            ['state_id'=>18,'district_name'=>'South Garo Hills'],
            ['state_id'=>18,'district_name'=>'South West Garo Hills'],
            ['state_id'=>18,'district_name'=>'South West Khasi Hills'],
            ['state_id'=>18,'district_name'=>'West Garo Hills'],
            ['state_id'=>18,'district_name'=>'West Jaintia Hills'],
            ['state_id'=>18,'district_name'=>'West Khasi Hills'],
            ['state_id'=>19,'district_name'=>'Bajali'],
            ['state_id'=>19,'district_name'=>'Baksa'],
            ['state_id'=>19,'district_name'=>'Barpeta'],
            ['state_id'=>19,'district_name'=>'Biswanath'],
            ['state_id'=>19,'district_name'=>'Bongaigaon'],
            ['state_id'=>19,'district_name'=>'Cachar'],
            ['state_id'=>19,'district_name'=>'Charaideo'],
            ['state_id'=>19,'district_name'=>'Chirang'],
            ['state_id'=>19,'district_name'=>'Darrang'],
            ['state_id'=>19,'district_name'=>'Dhemaji'],
            ['state_id'=>19,'district_name'=>'Dhubri'],
            ['state_id'=>19,'district_name'=>'Dibrugarh'],
            ['state_id'=>19,'district_name'=>'Dima Hasao'],
            ['state_id'=>19,'district_name'=>'Goalpara'],
            ['state_id'=>19,'district_name'=>'Golaghat'],
            ['state_id'=>19,'district_name'=>'Hailakandi'],
            ['state_id'=>19,'district_name'=>'Hojai'],
            ['state_id'=>19,'district_name'=>'Jorhat'],
            ['state_id'=>19,'district_name'=>'Kamrup'],
            ['state_id'=>19,'district_name'=>'Kamrup Metropolitan'],
            ['state_id'=>19,'district_name'=>'Karbi Anglong'],
            ['state_id'=>19,'district_name'=>'Karimganj'],
            ['state_id'=>19,'district_name'=>'Kokrajhar'],
            ['state_id'=>19,'district_name'=>'Lakhimpur'],
            ['state_id'=>19,'district_name'=>'Majuli'],
            ['state_id'=>19,'district_name'=>'Morigaon'],
            ['state_id'=>19,'district_name'=>'Nagaon'],
            ['state_id'=>19,'district_name'=>'Nalbari'],
            ['state_id'=>19,'district_name'=>'Sivasagar'],
            ['state_id'=>19,'district_name'=>'Sonitpur'],
            ['state_id'=>19,'district_name'=>'South Salmara-Mankachar'],
            ['state_id'=>19,'district_name'=>'Tinsukia'],
            ['state_id'=>19,'district_name'=>'Udalguri'],
            ['state_id'=>19,'district_name'=>'West Karbi Anglong'],
            ['state_id'=>20,'district_name'=>'Alipurduar'],
            ['state_id'=>20,'district_name'=>'Bankura'],
            ['state_id'=>20,'district_name'=>'Birbhum'],
            ['state_id'=>20,'district_name'=>'Cooch Behar'],
            ['state_id'=>20,'district_name'=>'Dakshin Dinajpur'],
            ['state_id'=>20,'district_name'=>'Darjeeling'],
            ['state_id'=>20,'district_name'=>'Hooghly'],
            ['state_id'=>20,'district_name'=>'Howrah'],
            ['state_id'=>20,'district_name'=>'Jalpaiguri'],
            ['state_id'=>20,'district_name'=>'Jhargram'],
            ['state_id'=>20,'district_name'=>'Kalimpong'],
            ['state_id'=>20,'district_name'=>'Kolkata'],
            ['state_id'=>20,'district_name'=>'Malda'],
            ['state_id'=>20,'district_name'=>'Murshidabad'],
            ['state_id'=>20,'district_name'=>'Nadia'],
            ['state_id'=>20,'district_name'=>'North 24 Parganas'],
            ['state_id'=>20,'district_name'=>'Paschim Bardhaman'],
            ['state_id'=>20,'district_name'=>'Paschim Medinipur'],
            ['state_id'=>20,'district_name'=>'Purba Bardhaman'],
            ['state_id'=>20,'district_name'=>'Purba Medinipur'],
            ['state_id'=>20,'district_name'=>'Purulia'],
            ['state_id'=>20,'district_name'=>'South 24 Parganas'],
            ['state_id'=>20,'district_name'=>'Uttar Dinajpur'],
            ['state_id'=>21,'district_name'=>'Bokaro'],
            ['state_id'=>21,'district_name'=>'Chatra'],
            ['state_id'=>21,'district_name'=>'Deoghar'],
            ['state_id'=>21,'district_name'=>'Dhanbad'],
            ['state_id'=>21,'district_name'=>'Dumka'],
            ['state_id'=>21,'district_name'=>'East Singhbhum'],
            ['state_id'=>21,'district_name'=>'Garhwa'],
            ['state_id'=>21,'district_name'=>'Giridih'],
            ['state_id'=>21,'district_name'=>'Godda'],
            ['state_id'=>21,'district_name'=>'Gumla'],
            ['state_id'=>21,'district_name'=>'Hazaribagh'],
            ['state_id'=>21,'district_name'=>'Jamtara'],
            ['state_id'=>21,'district_name'=>'Khunti'],
            ['state_id'=>21,'district_name'=>'Koderma'],
            ['state_id'=>21,'district_name'=>'Latehar'],
            ['state_id'=>21,'district_name'=>'Lohardaga'],
            ['state_id'=>21,'district_name'=>'Pakur'],
            ['state_id'=>21,'district_name'=>'Palamu'],
            ['state_id'=>21,'district_name'=>'Ramgarh'],
            ['state_id'=>21,'district_name'=>'Ranchi'],
            ['state_id'=>21,'district_name'=>'Sahebganj'],
            ['state_id'=>21,'district_name'=>'Seraikela Kharsawan'],
            ['state_id'=>21,'district_name'=>'Simdega'],
            ['state_id'=>21,'district_name'=>'West Singhbhum'],
            ['state_id'=>22,'district_name'=>'Angul'],
            ['state_id'=>22,'district_name'=>'Balangir'],
            ['state_id'=>22,'district_name'=>'Balasore'],
            ['state_id'=>22,'district_name'=>'Bargarh'],
            ['state_id'=>22,'district_name'=>'Bhadrak'],
            ['state_id'=>22,'district_name'=>'Boudh'],
            ['state_id'=>22,'district_name'=>'Cuttack'],
            ['state_id'=>22,'district_name'=>'Debagarh'],
            ['state_id'=>22,'district_name'=>'Dhenkanal'],
            ['state_id'=>22,'district_name'=>'Gajapati'],
            ['state_id'=>22,'district_name'=>'Ganjam'],
            ['state_id'=>22,'district_name'=>'Jagatsinghpur'],
            ['state_id'=>22,'district_name'=>'Jajpur'],
            ['state_id'=>22,'district_name'=>'Jharsuguda'],
            ['state_id'=>22,'district_name'=>'Kalahandi'],
            ['state_id'=>22,'district_name'=>'Kandhamal'],
            ['state_id'=>22,'district_name'=>'Kendrapara'],
            ['state_id'=>22,'district_name'=>'Kendujhar'],
            ['state_id'=>22,'district_name'=>'Khordha'],
            ['state_id'=>22,'district_name'=>'Koraput'],
            ['state_id'=>22,'district_name'=>'Malkangiri'],
            ['state_id'=>22,'district_name'=>'Mayurbhanj'],
            ['state_id'=>22,'district_name'=>'Nabarangpur'],
            ['state_id'=>22,'district_name'=>'Nayagarh'],
            ['state_id'=>22,'district_name'=>'Nuapada'],
            ['state_id'=>22,'district_name'=>'Puri'],
            ['state_id'=>22,'district_name'=>'Rayagada'],
            ['state_id'=>22,'district_name'=>'Sambalpur'],
            ['state_id'=>22,'district_name'=>'Subarnapur'],
            ['state_id'=>22,'district_name'=>'Sundergarh'],
            ['state_id'=>23,'district_name'=>'Balod'],
            ['state_id'=>23,'district_name'=>'Baloda Bazar'],
            ['state_id'=>23,'district_name'=>'Balrampur'],
            ['state_id'=>23,'district_name'=>'Bastar'],
            ['state_id'=>23,'district_name'=>'Bemetara'],
            ['state_id'=>23,'district_name'=>'Bijapur'],
            ['state_id'=>23,'district_name'=>'Bilaspur'],
            ['state_id'=>23,'district_name'=>'Dantewada'],
            ['state_id'=>23,'district_name'=>'Dhamtari'],
            ['state_id'=>23,'district_name'=>'Durg'],
            ['state_id'=>23,'district_name'=>'Gariaband'],
            ['state_id'=>23,'district_name'=>'Gaurela Pendra Marwahi'],
            ['state_id'=>23,'district_name'=>'Janjgir Champa'],
            ['state_id'=>23,'district_name'=>'Jashpur'],
            ['state_id'=>23,'district_name'=>'Kabirdham'],
            ['state_id'=>23,'district_name'=>'Kanker'],
            ['state_id'=>23,'district_name'=>'Kondagaon'],
            ['state_id'=>23,'district_name'=>'Korba'],
            ['state_id'=>23,'district_name'=>'Koriya'],
            ['state_id'=>23,'district_name'=>'Mahasamund'],
            ['state_id'=>23,'district_name'=>'Manendragarh'],
            ['state_id'=>23,'district_name'=>'Mohla Manpur'],
            ['state_id'=>23,'district_name'=>'Mungeli'],
            ['state_id'=>23,'district_name'=>'Narayanpur'],
            ['state_id'=>23,'district_name'=>'Raigarh'],
            ['state_id'=>23,'district_name'=>'Raipur'],
            ['state_id'=>23,'district_name'=>'Rajnandgaon'],
            ['state_id'=>23,'district_name'=>'Sakti'],
            ['state_id'=>23,'district_name'=>'Sarangarh Bilaigarh'],
            ['state_id'=>23,'district_name'=>'Sukma'],
            ['state_id'=>23,'district_name'=>'Surajpur'],
            ['state_id'=>23,'district_name'=>'Surguja'],
            ['state_id'=>24,'district_name'=>'Agar Malwa'],
            ['state_id'=>24,'district_name'=>'Alirajpur'],
            ['state_id'=>24,'district_name'=>'Anuppur'],
            ['state_id'=>24,'district_name'=>'Ashoknagar'],
            ['state_id'=>24,'district_name'=>'Balaghat'],
            ['state_id'=>24,'district_name'=>'Barwani'],
            ['state_id'=>24,'district_name'=>'Betul'],
            ['state_id'=>24,'district_name'=>'Bhind'],
            ['state_id'=>24,'district_name'=>'Bhopal'],
            ['state_id'=>24,'district_name'=>'Burhanpur'],
            ['state_id'=>24,'district_name'=>'Chachaura'],
            ['state_id'=>24,'district_name'=>'Chhatarpur'],
            ['state_id'=>24,'district_name'=>'Chhindwara'],
            ['state_id'=>24,'district_name'=>'Damoh'],
            ['state_id'=>24,'district_name'=>'Datia'],
            ['state_id'=>24,'district_name'=>'Dewas'],
            ['state_id'=>24,'district_name'=>'Dhar'],
            ['state_id'=>24,'district_name'=>'Dindori'],
            ['state_id'=>24,'district_name'=>'Guna'],
            ['state_id'=>24,'district_name'=>'Gwalior'],
            ['state_id'=>24,'district_name'=>'Harda'],
            ['state_id'=>24,'district_name'=>'Hoshangabad'],
            ['state_id'=>24,'district_name'=>'Indore'],
            ['state_id'=>24,'district_name'=>'Jabalpur'],
            ['state_id'=>24,'district_name'=>'Jhabua'],
            ['state_id'=>24,'district_name'=>'Katni'],
            ['state_id'=>24,'district_name'=>'Khandwa'],
            ['state_id'=>24,'district_name'=>'Khargone'],
            ['state_id'=>24,'district_name'=>'Maihar'],
            ['state_id'=>24,'district_name'=>'Mandla'],
            ['state_id'=>24,'district_name'=>'Mandsaur'],
            ['state_id'=>24,'district_name'=>'Morena'],
            ['state_id'=>24,'district_name'=>'Nagda'],
            ['state_id'=>24,'district_name'=>'Narsinghpur'],
            ['state_id'=>24,'district_name'=>'Neemuch'],
            ['state_id'=>24,'district_name'=>'Niwari'],
            ['state_id'=>24,'district_name'=>'Panna'],
            ['state_id'=>24,'district_name'=>'Raisen'],
            ['state_id'=>24,'district_name'=>'Rajgarh'],
            ['state_id'=>24,'district_name'=>'Ratlam'],
            ['state_id'=>24,'district_name'=>'Rewa'],
            ['state_id'=>24,'district_name'=>'Sagar'],
            ['state_id'=>24,'district_name'=>'Satna'],
            ['state_id'=>24,'district_name'=>'Sehore'],
            ['state_id'=>24,'district_name'=>'Seoni'],
            ['state_id'=>24,'district_name'=>'Shahdol'],
            ['state_id'=>24,'district_name'=>'Shajapur'],
            ['state_id'=>24,'district_name'=>'Sheopur'],
            ['state_id'=>24,'district_name'=>'Shivpuri'],
            ['state_id'=>24,'district_name'=>'Sidhi'],
            ['state_id'=>24,'district_name'=>'Singrauli'],
            ['state_id'=>24,'district_name'=>'Tikamgarh'],
            ['state_id'=>24,'district_name'=>'Ujjain'],
            ['state_id'=>24,'district_name'=>'Umaria'],
            ['state_id'=>24,'district_name'=>'Vidisha'],
            ['state_id'=>25,'district_name'=>'Ahmedabad'],
            ['state_id'=>25,'district_name'=>'Amreli'],
            ['state_id'=>25,'district_name'=>'Anand'],
            ['state_id'=>25,'district_name'=>'Aravalli'],
            ['state_id'=>25,'district_name'=>'Banaskantha'],
            ['state_id'=>25,'district_name'=>'Bharuch'],
            ['state_id'=>25,'district_name'=>'Bhavnagar'],
            ['state_id'=>25,'district_name'=>'Botad'],
            ['state_id'=>25,'district_name'=>'Chhota Udaipur'],
            ['state_id'=>25,'district_name'=>'Dahod'],
            ['state_id'=>25,'district_name'=>'Dang'],
            ['state_id'=>25,'district_name'=>'Devbhoomi Dwarka'],
            ['state_id'=>25,'district_name'=>'Gandhinagar'],
            ['state_id'=>25,'district_name'=>'Gir Somnath'],
            ['state_id'=>25,'district_name'=>'Jamnagar'],
            ['state_id'=>25,'district_name'=>'Junagadh'],
            ['state_id'=>25,'district_name'=>'Kheda'],
            ['state_id'=>25,'district_name'=>'Kutch'],
            ['state_id'=>25,'district_name'=>'Mahisagar'],
            ['state_id'=>25,'district_name'=>'Mehsana'],
            ['state_id'=>25,'district_name'=>'Morbi'],
            ['state_id'=>25,'district_name'=>'Narmada'],
            ['state_id'=>25,'district_name'=>'Navsari'],
            ['state_id'=>25,'district_name'=>'Panchmahal'],
            ['state_id'=>25,'district_name'=>'Patan'],
            ['state_id'=>25,'district_name'=>'Porbandar'],
            ['state_id'=>25,'district_name'=>'Rajkot'],
            ['state_id'=>25,'district_name'=>'Sabarkantha'],
            ['state_id'=>25,'district_name'=>'Surat'],
            ['state_id'=>25,'district_name'=>'Surendranagar'],
            ['state_id'=>25,'district_name'=>'Tapi'],
            ['state_id'=>25,'district_name'=>'Vadodara'],
            ['state_id'=>25,'district_name'=>'Valsad'],
            ['state_id'=>27,'district_name'=>'Dadra and Nagar Haveli'],
            ['state_id'=>27,'district_name'=>'Daman'],
            ['state_id'=>27,'district_name'=>'Diu'],
            ['state_id'=>28,'district_name'=>'Ahmednagar'],
            ['state_id'=>28,'district_name'=>'Akola'],
            ['state_id'=>28,'district_name'=>'Amravati'],
            ['state_id'=>28,'district_name'=>'Aurangabad'],
            ['state_id'=>28,'district_name'=>'Beed'],
            ['state_id'=>28,'district_name'=>'Bhandara'],
            ['state_id'=>28,'district_name'=>'Buldhana'],
            ['state_id'=>28,'district_name'=>'Chandrapur'],
            ['state_id'=>28,'district_name'=>'Dhule'],
            ['state_id'=>28,'district_name'=>'Gadchiroli'],
            ['state_id'=>28,'district_name'=>'Gondia'],
            ['state_id'=>28,'district_name'=>'Hingoli'],
            ['state_id'=>28,'district_name'=>'Jalgaon'],
            ['state_id'=>28,'district_name'=>'Jalna'],
            ['state_id'=>28,'district_name'=>'Kolhapur'],
            ['state_id'=>28,'district_name'=>'Latur'],
            ['state_id'=>28,'district_name'=>'Mumbai City'],
            ['state_id'=>28,'district_name'=>'Mumbai Suburban'],
            ['state_id'=>28,'district_name'=>'Nagpur'],
            ['state_id'=>28,'district_name'=>'Nanded'],
            ['state_id'=>28,'district_name'=>'Nandurbar'],
            ['state_id'=>28,'district_name'=>'Nashik'],
            ['state_id'=>28,'district_name'=>'Osmanabad'],
            ['state_id'=>28,'district_name'=>'Palghar'],
            ['state_id'=>28,'district_name'=>'Parbhani'],
            ['state_id'=>28,'district_name'=>'Pune'],
            ['state_id'=>28,'district_name'=>'Raigad'],
            ['state_id'=>28,'district_name'=>'Ratnagiri'],
            ['state_id'=>28,'district_name'=>'Sangli'],
            ['state_id'=>28,'district_name'=>'Satara'],
            ['state_id'=>28,'district_name'=>'Sindhudurg'],
            ['state_id'=>28,'district_name'=>'Solapur'],
            ['state_id'=>28,'district_name'=>'Thane'],
            ['state_id'=>28,'district_name'=>'Wardha'],
            ['state_id'=>28,'district_name'=>'Washim'],
            ['state_id'=>28,'district_name'=>'Yavatmal'],
            ['state_id'=>29,'district_name'=>'Anantapur'],
            ['state_id'=>29,'district_name'=>'Chittoor'],
            ['state_id'=>29,'district_name'=>'East Godavari'],
            ['state_id'=>29,'district_name'=>'Guntur'],
            ['state_id'=>29,'district_name'=>'Kadapa'],
            ['state_id'=>29,'district_name'=>'Krishna'],
            ['state_id'=>29,'district_name'=>'Kurnool'],
            ['state_id'=>29,'district_name'=>'Nellore'],
            ['state_id'=>29,'district_name'=>'Prakasam'],
            ['state_id'=>29,'district_name'=>'Srikakulam'],
            ['state_id'=>29,'district_name'=>'Visakhapatnam'],
            ['state_id'=>29,'district_name'=>'Vizianagaram'],
            ['state_id'=>29,'district_name'=>'West Godavari'],
            ['state_id'=>30,'district_name'=>'Bagalkot'],
            ['state_id'=>30,'district_name'=>'Bangalore Rural'],
            ['state_id'=>30,'district_name'=>'Bangalore Urban'],
            ['state_id'=>30,'district_name'=>'Belgaum'],
            ['state_id'=>30,'district_name'=>'Bellary'],
            ['state_id'=>30,'district_name'=>'Bidar'],
            ['state_id'=>30,'district_name'=>'Chamarajanagar'],
            ['state_id'=>30,'district_name'=>'Chikkaballapur'],
            ['state_id'=>30,'district_name'=>'Chikkamagaluru'],
            ['state_id'=>30,'district_name'=>'Chitradurga'],
            ['state_id'=>30,'district_name'=>'Dakshina Kannada'],
            ['state_id'=>30,'district_name'=>'Davanagere'],
            ['state_id'=>30,'district_name'=>'Dharwad'],
            ['state_id'=>30,'district_name'=>'Gadag'],
            ['state_id'=>30,'district_name'=>'Gulbarga'],
            ['state_id'=>30,'district_name'=>'Hassan'],
            ['state_id'=>30,'district_name'=>'Haveri'],
            ['state_id'=>30,'district_name'=>'Kodagu'],
            ['state_id'=>30,'district_name'=>'Kolar'],
            ['state_id'=>30,'district_name'=>'Koppal'],
            ['state_id'=>30,'district_name'=>'Mandya'],
            ['state_id'=>30,'district_name'=>'Mysore'],
            ['state_id'=>30,'district_name'=>'Raichur'],
            ['state_id'=>30,'district_name'=>'Ramanagara'],
            ['state_id'=>30,'district_name'=>'Shimoga'],
            ['state_id'=>30,'district_name'=>'Tumkur'],
            ['state_id'=>30,'district_name'=>'Udupi'],
            ['state_id'=>30,'district_name'=>'Uttara Kannada'],
            ['state_id'=>30,'district_name'=>'Vijayanagara'],
            ['state_id'=>30,'district_name'=>'Vijayapura '],
            ['state_id'=>30,'district_name'=>'Yadgir'],
            ['state_id'=>31,'district_name'=>'North Goa'],
            ['state_id'=>31,'district_name'=>'South Goa'],
            ['state_id'=>32,'district_name'=>'Lakshadweep'],
            ['state_id'=>33,'district_name'=>'Alappuzha'],
            ['state_id'=>33,'district_name'=>'Ernakulam'],
            ['state_id'=>33,'district_name'=>'Idukki'],
            ['state_id'=>33,'district_name'=>'Kannur'],
            ['state_id'=>33,'district_name'=>'Kasaragod'],
            ['state_id'=>33,'district_name'=>'Kollam'],
            ['state_id'=>33,'district_name'=>'Kottayam'],
            ['state_id'=>33,'district_name'=>'Kozhikode'],
            ['state_id'=>33,'district_name'=>'Malappuram'],
            ['state_id'=>33,'district_name'=>'Palakkad'],
            ['state_id'=>33,'district_name'=>'Pathanamthitta'],
            ['state_id'=>33,'district_name'=>'Thiruvananthapuram'],
            ['state_id'=>33,'district_name'=>'Thrissur'],
            ['state_id'=>33,'district_name'=>'Wayanad'],
            ['state_id'=>34,'district_name'=>'Ariyalur'],
            ['state_id'=>34,'district_name'=>'Chengalpattu'],
            ['state_id'=>34,'district_name'=>'Chennai'],
            ['state_id'=>34,'district_name'=>'Coimbatore'],
            ['state_id'=>34,'district_name'=>'Cuddalore'],
            ['state_id'=>34,'district_name'=>'Dharmapuri'],
            ['state_id'=>34,'district_name'=>'Dindigul'],
            ['state_id'=>34,'district_name'=>'Erode'],
            ['state_id'=>34,'district_name'=>'Kallakurichi'],
            ['state_id'=>34,'district_name'=>'Kanchipuram'],
            ['state_id'=>34,'district_name'=>'Kanyakumari'],
            ['state_id'=>34,'district_name'=>'Karur'],
            ['state_id'=>34,'district_name'=>'Krishnagiri'],
            ['state_id'=>34,'district_name'=>'Madurai'],
            ['state_id'=>34,'district_name'=>'Mayiladuthurai '],
            ['state_id'=>34,'district_name'=>'Nagapattinam'],
            ['state_id'=>34,'district_name'=>'Namakkal'],
            ['state_id'=>34,'district_name'=>'Nilgiris'],
            ['state_id'=>34,'district_name'=>'Perambalur'],
            ['state_id'=>34,'district_name'=>'Pudukkottai'],
            ['state_id'=>34,'district_name'=>'Ramanathapuram'],
            ['state_id'=>34,'district_name'=>'Ranipet'],
            ['state_id'=>34,'district_name'=>'Salem'],
            ['state_id'=>34,'district_name'=>'Sivaganga'],
            ['state_id'=>34,'district_name'=>'Tenkasi'],
            ['state_id'=>34,'district_name'=>'Thanjavur'],
            ['state_id'=>34,'district_name'=>'Theni'],
            ['state_id'=>34,'district_name'=>'Thoothukudi'],
            ['state_id'=>34,'district_name'=>'Tiruchirappalli'],
            ['state_id'=>34,'district_name'=>'Tirunelveli'],
            ['state_id'=>34,'district_name'=>'Tirupattur'],
            ['state_id'=>34,'district_name'=>'Tiruppur'],
            ['state_id'=>34,'district_name'=>'Tiruvallur'],
            ['state_id'=>34,'district_name'=>'Tiruvannamalai'],
            ['state_id'=>34,'district_name'=>'Tiruvarur'],
            ['state_id'=>34,'district_name'=>'Vellore'],
            ['state_id'=>34,'district_name'=>'Viluppuram'],
            ['state_id'=>34,'district_name'=>'Virudhunagar'],
            ['state_id'=>35,'district_name'=>'Karaikal'],
            ['state_id'=>35,'district_name'=>'Mahe'],
            ['state_id'=>35,'district_name'=>'Puducherry'],
            ['state_id'=>35,'district_name'=>'Yanam'],
            ['state_id'=>36,'district_name'=>'Nicobar'],
            ['state_id'=>36,'district_name'=>'North Middle Andaman'],
            ['state_id'=>36,'district_name'=>'South Andaman'],
            ['state_id'=>37,'district_name'=>'Adilabad'],
            ['state_id'=>37,'district_name'=>'Bhadradri Kothagudem'],
            ['state_id'=>37,'district_name'=>'Hanamkonda'],
            ['state_id'=>37,'district_name'=>'Hyderabad'],
            ['state_id'=>37,'district_name'=>'Jagtial'],
            ['state_id'=>37,'district_name'=>'Jangaon'],
            ['state_id'=>37,'district_name'=>'Jayashankar'],
            ['state_id'=>37,'district_name'=>'Jogulamba'],
            ['state_id'=>37,'district_name'=>'Kamareddy'],
            ['state_id'=>37,'district_name'=>'Karimnagar'],
            ['state_id'=>37,'district_name'=>'Khammam'],
            ['state_id'=>37,'district_name'=>'Komaram Bheem'],
            ['state_id'=>37,'district_name'=>'Mahabubabad'],
            ['state_id'=>37,'district_name'=>'Mahbubnagar'],
            ['state_id'=>37,'district_name'=>'Mancherial'],
            ['state_id'=>37,'district_name'=>'Medak'],
            ['state_id'=>37,'district_name'=>'Medchal'],
            ['state_id'=>37,'district_name'=>'Mulugu'],
            ['state_id'=>37,'district_name'=>'Nagarkurnool'],
            ['state_id'=>37,'district_name'=>'Nalgonda'],
            ['state_id'=>37,'district_name'=>'Narayanpet'],
            ['state_id'=>37,'district_name'=>'Nirmal'],
            ['state_id'=>37,'district_name'=>'Nizamabad'],
            ['state_id'=>37,'district_name'=>'Peddapalli'],
            ['state_id'=>37,'district_name'=>'Rajanna Sircilla'],
            ['state_id'=>37,'district_name'=>'Ranga Reddy'],
            ['state_id'=>37,'district_name'=>'Sangareddy'],
            ['state_id'=>37,'district_name'=>'Siddipet'],
            ['state_id'=>37,'district_name'=>'Suryapet'],
            ['state_id'=>37,'district_name'=>'Vikarabad'],
            ['state_id'=>37,'district_name'=>'Wanaparthy'],
            ['state_id'=>37,'district_name'=>'Warangal'],
            ['state_id'=>37,'district_name'=>'Yadadri Bhuvanagiri'],
            ['state_id'=>38,'district_name'=>'Kargil'],
            ['state_id'=>38,'district_name'=>'Leh'],
        ]);


        $this->command->info('All States are added');
        //Transaction types
        TransactionType::create(['transaction_name'=>'Dr.','formal_name'=>'Debit','transaction_type_value'=>1]);
        TransactionType::create(['transaction_name'=>'Cr.','formal_name'=>'Credit','transaction_type_value'=>-1]);
        $this->command->info('Transaction Type Created');

        LedgerGroup::insert([
            ['group_name'=>'Current Assets'],           //1
            ['group_name'=>'Indirect Expenses'],        //2
            ['group_name'=>'Current Liabilities'],      //3
            ['group_name'=>'Fixed Assets'],             //4
            ['group_name'=>'Direct Incomes'],           //5
            ['group_name'=>'Indirect Incomes'],         //6
            ['group_name'=>'Bank Account'],             //7
            ['group_name'=>'Loans & Liabilities'],      //8
            ['group_name'=>'Bank OD'],                  //9
            ['group_name'=>'Branch & Division'],        //10
            ['group_name'=>'Capital Account'],          //11
            ['group_name'=>'Direct Expenses'],          //12
            ['group_name'=>'Cash in Hand'],             //13
            ['group_name'=>'Stock in Hand'],            //14
            ['group_name'=>'Sundry Creditors'],         //15
            ['group_name'=>'Sundry Debtors'],           //16
            ['group_name'=>'Suspense Account'],         //17
            ['group_name'=>'Indirect Income'],          //18
            ['group_name'=>'Sales Account'],            //19
            ['group_name'=>'Duties & Taxes'],           //20
            ['group_name'=>'Investment'],               //21
            ['group_name'=>'Purchase Account'],         //22
            ['group_name'=>'Investments']               //23
        ]);

        $this->command->info('Ledger groups are added');
        VoucherType::insert([
            ['voucher_type_name'=>'Sales Voucher'],              //1
            ['voucher_type_name'=>'Purchase Voucher'],           //2
            ['voucher_type_name'=>'Payment Voucher'],            //3
            ['voucher_type_name'=>'Receipt Voucher'],            //4
            ['voucher_type_name'=>'Contra Voucher'],             //5
            ['voucher_type_name'=>'Journal Voucher'],            //6
            ['voucher_type_name'=>'Credit Note Voucher'],        //7
            ['voucher_type_name'=>'Debit Note Voucher'],         //8
            ['voucher_type_name'=>'Fees Charged Journal Voucher'],//9

        ]);
        $this->command->info('Voucher type created');

        //Ledgers to be created other than Student
        Ledger::insert([
            /*1 Cash In Hand*/       ['episode_id' =>Str::random(20),'ledger_name'=>'Cash in Hand','billing_name'=>'Cash in Hand','ledger_group_id'=>13,'state_id'=>1,'transaction_type_id'=>1,'opening_balance'=>0,'is_student'=>0],
            /*2 Bank Account*/       ['episode_id' =>Str::random(20),'ledger_name'=>'Bank Account','billing_name'=>'Bank Account','ledger_group_id'=>7,'state_id'=>1,'transaction_type_id'=>1,'opening_balance'=>0,'is_student'=>0],
            /*3 Back Account 1*/     ['episode_id' =>Str::random(20),'ledger_name'=>'Bank Account 1','billing_name'=>'Bank Account 1','ledger_group_id'=>7,'state_id'=>1,'transaction_type_id'=>1,'opening_balance'=>0,'is_student'=>0],
            /*4 Bank Account 2*/     ['episode_id' =>Str::random(20),'ledger_name'=>'Bank Account 2','billing_name'=>'Bank Account 2','ledger_group_id'=>7,'state_id'=>1,'transaction_type_id'=>1,'opening_balance'=>0,'is_student'=>0],
            /*5 Purchase*/           ['episode_id' =>Str::random(20),'ledger_name'=>'Purchase','billing_name'=>'Purchase','ledger_group_id'=>22,'state_id'=>1,'transaction_type_id'=>1,'opening_balance'=>0,'is_student'=>0],
            /*6 Sale*/               ['episode_id' =>Str::random(20),'ledger_name'=>'Sale','billing_name'=>'Sale','ledger_group_id'=>19,'state_id'=>1,'transaction_type_id'=>2,'opening_balance'=>0,'is_student'=>0],
            /*7 Admission Fees*/     ['episode_id' =>Str::random(20),'ledger_name'=>'Admission Fees','billing_name'=>'Admission Fees','ledger_group_id'=>6,'state_id'=>1,'transaction_type_id'=>2,'opening_balance'=>0,'is_student'=>0],
            /*8 Admission Fees*/     ['episode_id' =>Str::random(20),'ledger_name'=>'Course Fees','billing_name'=>'Course Fees','ledger_group_id'=>6,'state_id'=>1,'transaction_type_id'=>2,'opening_balance'=>0,'is_student'=>0],
            /*9 Monthly Fees*/       ['episode_id' =>Str::random(20),'ledger_name'=>'Monthly Fees','billing_name'=>'Monthly Fees','ledger_group_id'=>6,'state_id'=>1,'transaction_type_id'=>2,'opening_balance'=>0,'is_student'=>0],
            /*10 Other Fees*/        ['episode_id' =>Str::random(20),'ledger_name'=>'Other Fees','billing_name'=>'Other Fees','ledger_group_id'=>6,'state_id'=>1,'transaction_type_id'=>2,'opening_balance'=>0,'is_student'=>0],
            /*11 Discount */         ['episode_id' =>Str::random(20),'ledger_name'=>'Discount Allowed','billing_name'=>'Discount Allowed','ledger_group_id'=>2,'state_id'=>1,'transaction_type_id'=>1,'opening_balance'=>0,'is_student'=>0],
        ]);

        Ledger::create([
            'episode_id' =>'a1',
            'ledger_name' => 'Bimal Paul',
            'billing_name' => 'Mr. Bimal Paul',
            'ledger_group_id' => 16,
            'is_student' =>1,
            'father_name' => 'Atanu Paul',
            'mother_name' => 'Aroti Paul',
            'guardian_name' => 'Atanu Paul',
            'relation_to_guardian' => 'Father',
            'dob' => '1999-08-14',
            'sex' => 'M',
            'address' => '56/7,Rabindrapally',
            'city' => 'Barrackpore',
            'district' => 'North 24 Parganas',
            'state_id' => 22,
            'pin' => '700122',
            'guardian_contact_number' => '9832700122',
            'whatsapp_number' => '7985241065',
            'email_id' => 'bimalpaul@gmail.com',
            'qualification' => 'HS'
        ]);
        Ledger::create([
            'episode_id' =>'a2',
            'is_student' =>1,
            'ledger_name' => 'Ramen Paul',
            'billing_name' => 'Mr. Ramen Paul',
            'ledger_group_id' => 16,
            'father_name' => 'Sourav Das',
            'mother_name' => 'Kakali Das',
            'guardian_name' => 'Kakali Das',
            'relation_to_guardian' => 'mother',
            'dob' => '2000-05-15',
            'sex' => 'F',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'riya99@gmail.com',
            'qualification' => 'HS'

        ]);
        Ledger::create([
            'episode_id' =>'a3',
            'is_student' =>1,
            'ledger_name' => 'XRamen Paul',
            'billing_name' => 'Mr. Ramen Paul',
            'ledger_group_id' => 16,
            'father_name' => 'Sourav Das',
            'mother_name' => 'Kakali Das',
            'guardian_name' => 'Kakali Das',
            'relation_to_guardian' => 'mother',
            'dob' => '2000-05-15',
            'sex' => 'F',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'riya99@gmail.com',
            'qualification' => 'HS'

        ]);

        Ledger::create([
            'episode_id' =>'a4',
            'is_student' =>1,
            'ledger_name' => 'Ramesh Chowdhury',
            'billing_name' => 'Mr. Ramesh Chowdhury',
            'ledger_group_id' => 16,
            'father_name' => 'Prakash Chowdhury',
            'mother_name' => 'Sumita Chowdhury',
            'guardian_name' => 'Prakash Chowdhury',
            'relation_to_guardian' => 'father',
            'dob' => '2000-05-15',
            'sex' => 'M',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'rameshchowdhury@gmail.com',
            'qualification' => 'HS'

        ]);
        Ledger::create([
            'episode_id' =>'a5',
            'is_student' =>1,
            'ledger_name' => 'Smita Sen',
            'billing_name' => 'Miss. Smita Sen',
            'ledger_group_id' => 16,
            'father_name' => 'Rohit Sen',
            'mother_name' => 'Susmita Sen',
            'guardian_name' => 'Susmita Sen',
            'relation_to_guardian' => 'Mother',
            'dob' => '2000-05-15',
            'sex' => 'F',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'sensusmita@gmail.com',
            'qualification' => 'Graduate'

        ]);
        Ledger::create([
            'episode_id' =>'a6',
            'is_student' =>1,
            'ledger_name' => 'Joy Paul',
            'billing_name' => 'Mr. Joy Paul',
            'ledger_group_id' => 16,
            'father_name' => 'Raja Paul',
            'mother_name' => 'Anita Paul',
            'guardian_name' => 'Raja Paul',
            'relation_to_guardian' => 'father',
            'dob' => '2000-05-15',
            'sex' => 'M',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'pauljoy@gmail.com',
            'qualification' => 'HS'

        ]);
        Ledger::create([
            'episode_id' =>'a7',
            'is_student' =>1,
            'ledger_name' => 'Dinesh Agarwal',
            'billing_name' => 'Mr. Dinesh Agarwal',
            'ledger_group_id' => 16,
            'father_name' => 'Sitesh Agarwal',
            'mother_name' => 'Dipti Agarwal',
            'guardian_name' => 'Dipti Agarwal',
            'relation_to_guardian' => 'mother',
            'dob' => '2000-05-15',
            'sex' => 'M',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'dinagarwal@gmail.com',
            'qualification' => '10th'

        ]);
        Ledger::create([
            'episode_id' =>'a8',
            'is_student' =>1,
            'ledger_name' => 'Prasen Chowdhury',
            'billing_name' => 'Mr. Prasen Chowdhury',
            'ledger_group_id' => 16,
            'father_name' => 'Susen Chowdhury',
            'mother_name' => 'Priya Chowdhury',
            'guardian_name' => 'priya Chowdhury',
            'relation_to_guardian' => 'mother',
            'dob' => '2000-05-15',
            'sex' => 'M',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'prasenchowdhury@gmail.com',
            'qualification' => '12th'

        ]);
        Ledger::create([
            'episode_id' =>'a9',
            'is_student' =>1,
            'ledger_name' => 'Anandi Das',
            'billing_name' => 'Miss. Anandi Das',
            'ledger_group_id' => 16,
            'father_name' => 'Ananda Das',
            'mother_name' => 'Smrity Das',
            'guardian_name' => 'Ananda Das',
            'relation_to_guardian' => 'father',
            'dob' => '2000-05-15',
            'sex' => 'F',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'dasanandi001@gmail.com',
            'qualification' => 'HS'

        ]);
        Ledger::create([
            'episode_id' =>'a10',
            'is_student' =>1,
            'ledger_name' => 'Priyobrata Chowdhury',
            'billing_name' => 'Mr. Priyobrata Chowdhury',
            'ledger_group_id' => 16,
            'father_name' => 'Surya Chowdhury',
            'mother_name' => 'Rini Chowdhury',
            'guardian_name' => 'Rini Chowdhury',
            'relation_to_guardian' => 'mother',
            'dob' => '2000-05-15',
            'sex' => 'M',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'priyobratachowdhury@gmail.com',
            'qualification' => 'HS'

        ]);
    /*insert into durationType table*/
    DurationType::insert([
        /*1*/    ['duration_name' => 'Not Applicable'],
        /*1*/    ['duration_name' => 'Days'],
        /*2*/    ['duration_name' => 'Year'],
        /*3*/    ['duration_name' => 'Month'],
        /*4*/    ['duration_name' => 'Week'],
        /*5*/    ['duration_name' => 'Hours']
   ]);

    //Fees Modes
    FeesModeType::insert([
        ['fees_mode_type_name'=>'Monthly'],
        ['fees_mode_type_name'=>'Single']
    ]);
    //storing course
        Course::create([
           'fees_mode_type_id'=>1,
           'course_code' => 'ab',
           'short_name' => 'Tally',
           'full_name' => 'Tally',
           'course_duration' => 100,
           'duration_type_id' => '4'
        ]);

        Course::create([
            'fees_mode_type_id'=>2,
            'course_code' => 'az',
            'short_name' => 'Ms word',
            'full_name' => 'Micro soft office word',
            'course_duration' => 200,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>2,
            'course_code' => 'bc',
            'short_name' => 'Excel',
            'full_name' => 'Micro soft excel',
            'course_duration' => 300,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'cd',
            'short_name' => 'Web Based Software Devolopment',
            'full_name' => 'Tally',
            'course_duration' => 100,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'gh',
            'short_name' => 'Powerpoint',
            'full_name' => 'Powerpoint',
            'course_duration' => 20,
            'duration_type_id' => '4'
         ]);
         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'ef',
            'short_name' => 'Office 10',
            'full_name' => 'Micosoft Office 10',
            'course_duration' => 20,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'ij',
            'short_name' => 'C',
            'full_name' => 'Programming Language C',
            'course_duration' => 20,
            'duration_type_id' => '4'

         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'kl',
            'short_name' => 'CP',
            'full_name' => 'Programming Language C+',
            'course_duration' => 20,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'mn',
            'short_name' => 'CPP',
            'full_name' => 'Programming Language C++',
            'course_duration' => 20,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'jv',
            'short_name' => 'JAVA',
            'full_name' => 'Programming Language JAVA',
            'course_duration' => 20,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'ph',
            'short_name' => 'PYTHON',
            'full_name' => 'Programming Language PYTHON',
            'course_duration' => 20,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'html',
            'short_name' => 'HTML',
            'full_name' => 'Hyper Text Markup Language',
            'course_duration' => 20,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'js',
            'short_name' => 'JavaScript',
            'full_name' => 'Programming Language JavaScript',
            'course_duration' => 20,
             'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'sql',
            'short_name' => 'SQL',
            'full_name' => 'Structured Query Language',
            'course_duration' => 20,
             'duration_type_id' => '4'
         ]);






        Subject::insert([
            /*1*/    ['subject_code'=>'MSW','subject_short_name'=>'MS-Word','subject_full_name'=>'Microsoft Office','subject_duration'=>5,'duration_type_id' => '4','subject_description'=>'Microsoft office Word for beginners'],
            /*2*/    ['subject_code'=>'MSWA','subject_short_name'=>'MS-Word Advance','subject_full_name'=>'Advance Microsoft Office','subject_duration'=>10,'duration_type_id' => '4','subject_description'=>'Microsoft office word for advance user'],
            /*3*/    ['subject_code'=>'MSEX','subject_short_name'=>'MS-Excel','subject_full_name'=>'Microsoft Excel','subject_duration'=>10,'duration_type_id' => '4','subject_description'=>'Microsoft office excel for beginners'],
            /*4*/    ['subject_code'=>'MSEXA','subject_short_name'=>'MS-Excel Advance','subject_full_name'=>'Advance Microsoft Excel','subject_duration'=>20,'duration_type_id' => '4','subject_description'=>'Microsoft office excel for advance user'],
            /*4*/    ['subject_code'=>'MSPPT','subject_short_name'=>'MS-PowerPoint','subject_full_name'=>'Microsoft Power Point','subject_duration'=>20,'duration_type_id' => '4','subject_description'=>'Microsoft office Power Point'],

            /*5*/    ['subject_code'=>'EXCAXI-III','subject_short_name'=>'Computer Application','subject_full_name'=>'Computer Application for Class I to III','subject_duration'=>0,'duration_type_id' => '1','subject_description'=>'Computer Application for ClassI to III'],
            /*6*/    ['subject_code'=>'EXCAXIV-V','subject_short_name'=>'Computer Application','subject_full_name'=>'Computer Application for Class IV to V','subject_duration'=>0,'duration_type_id' => '1','subject_description'=>'Computer Application for Class IV to V'],


            /**/    ['subject_code'=>'C','subject_short_name'=>'C','subject_full_name'=>'Programming Language C','subject_duration'=>20,'duration_type_id' => '4','subject_description'=>'Programming Language For C'],
            /**/    ['subject_code'=>'C-S','subject_short_name'=>'CompSc','subject_full_name'=>'Computer Science','subject_duration'=>00,'duration_type_id' => '1','subject_description'=>'Computer Science'],
            /**/    ['subject_code'=>'JICSE','subject_short_name'=>'JAVA ICSE','subject_full_name'=>'JAVA for ICSE','subject_duration'=>00,'duration_type_id' => '1','subject_description'=>'JAVA for ICSE'],
        ]);
        QuestionLevel::insert([
            ['level_name'=>'Easy'],
            ['level_name'=>'Moderate']
        ]);

        Chapter::insert([
            ['chapter_name'=>'General','subject_id'=>10],
            ['chapter_name'=>'Operators','subject_id'=>10]
        ]);
        QuestionType::insert([
            ['question_type_name'=>'MCQ'],
            ['question_type_name'=>'Descriptive']
        ]);


        $x=StudentCourseRegistration::create(['ledger_id'=>11,'course_id'=>1,'reference_number'=>1,'base_fee'=>3000,'discount_allowed'=>1200,'joining_date'=>'2019-01-08','effective_date'=>'2019-02-01','completion_date'=>'2019-11-05','is_started'=>1,'is_completed'=>1]);
        $x=StudentCourseRegistration::create(['ledger_id'=>11,'course_id'=>2,'reference_number'=>2,'base_fee'=>6900,'discount_allowed'=>3200,'joining_date'=>'2019-11-28','effective_date'=>'2019-12-01','completion_date'=>'2020-11-05', 'is_started'=>1,'is_completed'=>1]);
        $this->command->info($x);
        StudentCourseRegistration::create(['ledger_id'=>11,'course_id'=>3,'reference_number'=>3,'base_fee'=>6900,'discount_allowed'=>5200,'joining_date'=>'2020-12-28','effective_date'=>'2020-12-29','completion_date'=>'2021-04-05', 'is_started'=>1,'is_completed'=>1]);
        StudentCourseRegistration::create(['ledger_id'=>11,'course_id'=>4,'reference_number'=>4,'base_fee'=>6900,'discount_allowed'=>5200,'joining_date'=>'2021-04-02','effective_date'=>'2021-04-05','is_started'=>1, 'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>12,'course_id'=>4,'reference_number'=>5,'base_fee'=>6900,'discount_allowed'=>5200,'joining_date'=>'2020-02-28','effective_date'=>'2020-03-05','completion_date'=>'2020-11-05', 'is_started'=>1,'is_completed'=>1]);
        StudentCourseRegistration::create(['ledger_id'=>13,'course_id'=>4,'reference_number'=>6,'base_fee'=>6900,'discount_allowed'=>5200,'joining_date'=>'2021-02-2','effective_date'=>'2020-03-01', 'completion_date'=>'2020-10-05','is_started'=>1,'is_completed'=>1]);

        StudentCourseRegistration::create(['ledger_id'=>13,'course_id'=>4,'reference_number'=>7,'base_fee'=>6900,'discount_allowed'=>5200,'joining_date'=>'2021-02-2','effective_date'=>'2021-03-01','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>13,'course_id'=>4,'reference_number'=>8,'base_fee'=>6900,'discount_allowed'=>5200,'joining_date'=>'2021-02-2',]);
        StudentCourseRegistration::create(['ledger_id'=>17,'course_id'=>4,'reference_number'=>9,'base_fee'=>350,'discount_allowed'=>0,'joining_date'=>'2021-02-2','effective_date'=>'2021-03-01','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>11,'course_id'=>5,'reference_number'=>10,'base_fee'=>1350,'discount_allowed'=>0,'joining_date'=>'2021-04-02','effective_date'=>'2021-04-10','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>15,'course_id'=>5,'reference_number'=>11,'base_fee'=>1350,'discount_allowed'=>0,'joining_date'=>'2021-03-02','effective_date'=>'2021-03-10','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>18,'course_id'=>14,'reference_number'=>12,'base_fee'=>2500,'discount_allowed'=>0,'joining_date'=>'2021-05-18','effective_date'=>'2021-05-20','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>20,'course_id'=>11,'reference_number'=>13,'base_fee'=>3000,'discount_allowed'=>0,'joining_date'=>'2021-01-18','effective_date'=>'2021-03-20','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>16,'course_id'=>9,'reference_number'=>14,'base_fee'=>1200,'discount_allowed'=>0,'joining_date'=>'2021-06-01','effective_date'=>'2021-06-05','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>14,'course_id'=>9,'reference_number'=>15,'base_fee'=>1500,'discount_allowed'=>0,'joining_date'=>'2021-05-01','effective_date'=>'2021-06-10','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>19,'course_id'=>12,'reference_number'=>16,'base_fee'=>2600,'discount_allowed'=>100,'joining_date'=>'2021-04-18','effective_date'=>'2021-05-05','is_started'=>1,'is_completed'=>0]);
    }
}
