<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Doctor;

class DoctorTest extends TestCase
{
    public function testCreateDoctor()
    {
        $doctor = Doctor::create([
            'doctor_name' => 'Dr. Juan Perez',
            'department' => 'Cardiología',
        ]);
        $this->assertInstanceOf(Doctor::class, $doctor);
        $this->assertEquals('Dr. Juan Perez', $doctor->doctor_name);
        $this->assertEquals('Cardiología', $doctor->department);
    }
}
