<?php

namespace Kasper334\Tests;

use Carbon\Carbon;
use Kasper334\PeopleforceSdk\Entities\{Team, TeamLead, TeamMember, TeamMemberUser};

class TeamsTest extends BaseTestCase
{
    /**
     * @test
     */
    public function getAll(): void
    {
        $teams = $this->api->teams->getAll();
        $this->assertGreaterThan(0, count($teams));

        foreach ($teams as $team) {
            $this->assertIsTeamEntity($team);
        }
    }

    private function assertIsTeamEntity($team): void
    {
        $this->assertInstanceOf(Team::class, $team);

        $this->assertInstanceOf(Carbon::class, $team->created_at);

        $this->assertInstanceOf(Carbon::class, $team->updated_at);

        $this->assertInstanceOf(TeamLead::class, $team->team_lead);

        $this->assertIsArray($team->team_members);

        foreach ($team->team_members as $member) {
            $this->assertInstanceOf(TeamMember::class, $member);
            $this->assertInstanceOf(TeamMemberUser::class, $member->user);
        }
    }
}
