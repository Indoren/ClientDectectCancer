<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Role;
use App\Models\Permission;

class RoleTest extends TestCase
{
    public function testCreateRoleWithPermissions()
    {
        // Crear permisos
        $permissions = Permission::factory()->count(1)->create();
    
        // Crear un rol y asociar los permisos
        $role = Role::factory()->create();
        $role->permissions()->attach($permissions);
    
        // Verificar que se haya creado correctamente el rol
        $this->assertInstanceOf(Role::class, $role);
        $this->assertEquals(1, $role->id);
        $this->assertEquals('Nombre del Rol', $role->title);
    
        // Verificar que se haya asociado correctamente solo un permiso al rol
        $this->assertCount(1, $role->permissions);
        $this->assertTrue($role->permissions->contains($permissions->first()));
    }
    
}
