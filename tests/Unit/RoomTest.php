<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Room;

class RoomTest extends TestCase
{
    public function testCreateRoom()
    {
        $room = Room::create([
            'room_number' => '101',
            'room_type' => 'Individual',
        ]);
        $this->assertInstanceOf(Room::class, $room);
        $this->assertEquals('101', $room->room_number);
        $this->assertEquals('Individual', $room->room_type);
    }
}
