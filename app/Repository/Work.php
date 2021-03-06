<?php
/**
 * Created by PhpStorm.
 * User: Lee Crosdale
 * Date: 23/02/2019
 * Time: 18:11
 */

namespace App\Repository;


use App\Building;
use App\Enums\BuildingType;
use App\Enums\SupplyType;
use App\User;
use App\UserBuilding;
use App\UserSupply;
use Carbon\Carbon;
use mysql_xdevapi\Exception;

class Work
{

    public function doWork(UserBuilding $userBuilding, $user) {

        if ($user->energy < 2) return;

        $user->energy -= 2;
        $user->save();

        $type = $this->getType($userBuilding->building);

        $supply = $user->supplies()->where('slug',$type)->first();
        $user_supply = UserSupply::where('user_id', $user->id)->where('supply_id', $supply->id)->first();

        $user_supply->amount = $user_supply->amount + $userBuilding->next_work_supply;
        $user_supply->save();

        $user->give_exp(2 * $userBuilding->level);

        $userBuilding->next_work = Carbon::now()->addSeconds($userBuilding->level + random_int(1,10));
        $userBuilding->save();

    }

    public function getType(Building $building) {

        switch($building->type) {

            case BuildingType::FARM:
            case BuildingType::HOUSE:
                // Food
                $type = SupplyType::FOOD;
                break;

            case BuildingType::MINE:
                // Stone
                $type = SupplyType::STONE;
                break;

            case BuildingType::WOOD:
                $type = SupplyType::WOOD;
                break;

            default:
                throw new \Exception('Set up the bloody types lee');

        }

        return $type;
    }

}
