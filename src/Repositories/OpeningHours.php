<?php

namespace Bakery\Repositories;

use Bakery\Models\OpeningDay;
use Data\Postgres;
use Io\Attributes\Inject;
use Io\Support\Row;

final class OpeningHours
{
    #[Inject]
    private Postgres $db;

    /** @return array<int, OpeningDay> ISO weekday => its hours; closed days are missing */
    public function week(): array
    {
        $week = [];
        foreach ($this->db->query("SELECT weekday, to_char(opens, 'HH24:MI') AS opens, to_char(closes, 'HH24:MI') AS closes FROM opening_hours") as $values) {
            $row = new Row($values);
            $week[$row->int('weekday')] = new OpeningDay($row->int('weekday'), $row->string('opens'), $row->string('closes'));
        }
        return $week;
    }
}
