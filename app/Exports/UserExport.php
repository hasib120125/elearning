<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromQuery;
use App\Models\User;
use App\Models\Team;


class UserExport implements FromQuery ,Responsable, WithMapping, WithHeadings, ShouldAutoSize,WithColumnFormatting
{
    use Exportable;
    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'Users.xlsx';

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function query()
    {
        $request = $this->request;
        
        $query = User::with('roles')
            ->with('teams')
            ->whereNotIn('username', ['sa'])
            ->where('is_active',$this->request->active_id)
            ->select('users.*');
        if ($request->team_ids) {
            $query->whereHas('teams', function ($query) use ($request) {
                $query->whereIn('teams.id', $request->team_ids);
            });
        } elseif ($request->group_ids) {
            $team_ids = Team::whereIn('group_id', $request->group_ids)->pluck('id');
            $query->whereHas('teams', function ($query) use ($team_ids) {
                $query->whereIn('teams.id', $team_ids);
            });
        }

        return $query;
    }

    public function map($user): array
    {
        return [
            $user->username,
            $user->code,
            $user->name,
            $user->phone,
            $user->teams()->pluck('name')->implode(', '),
            $user->roles->first()->display_name,
        ];
    }

    public function headings(): array
    {
        return ['Login Id','Employee ID','Name', 'Phone','Team','Type'];
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}
