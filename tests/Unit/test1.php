<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Anuncio;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class AnuncioControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testa se o index da função retorna uma view.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/anuncios');

        $response->assertStatus(200);
        $response->assertViewIs('anuncios.index');
    }

    /**
     * Testa se a função create retorna uma view.
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->get('/anuncios/create');

        $response->assertStatus(200);
        $response->assertViewIs('anuncios.create');
    }

    /**
     * Testa se o store da função está salvando o anúncio corretamente.
     *
     * @return void
     */
    public function testStore()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post('/anuncios', [
            'titulo' => 'Teste',
            'preco' => '10',
            'estado' => 'Novo',
            'descricao' => 'Teste de descrição',
            'image' => UploadedFile::fake()->image('image.jpg'),
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/anuncios');
        $this->assertDatabaseHas('anuncios', [
            'titulo' => 'Teste',
            'preco' => '10',
            'estado' => 'Novo',
            'descricao' => 'Teste de descrição',
        ]);
        Storage::assertExists('public/images/' . Anuncio::first()->path);
    }

    /**
     * Testa se a função show está retornando uma view com o anúncio correto.
     *
     * @return void
     */
    public function testShow()
    {
        $anuncio = factory(Anuncio::class)->create();

        $response = $this->get('/anuncios/' . $anuncio->id);

        $response->assertStatus(200);
        $response->assertViewIs('anuncios.show');
        $response->assertViewHas('anuncio', $anuncio);
    }

    /**
     * Testa se a função edit está retornando uma view com o anúncio correto.
     *
     * @return void
     */
    public function testEdit()
    {
        $anuncio = factory(Anuncio::class)->create();
        $response = $this->get('/anuncios/' . $anuncio->id . '/edit');

        $response->assertStatus(200);
        $response->assertViewIs('anuncios.edit');
        $response->assertViewHas('anuncio', $anuncio);
    }

    /**
     * Testa se a função update está atualizando o anúncio corretamente.
     *
     * @return void
     */
    public function testUpdate()
    {
        $anuncio = factory(Anuncio::class)->create();

        $response = $this->put('/anuncios/' . $anuncio->id, [
            'titulo' => 'Teste Atualizado',
            'preco' => '20',
            'estado' => 'Usado',
            'descricao' => 'Teste de descrição atualizada',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/anuncios');
        $this->assertDatabaseHas('anuncios', [
            'titulo' => 'Teste Atualizado',
            'preco' => '20',
            'estado' => 'Usado',
            'descricao' => 'Teste de descrição atualizada',
        ]);
    }

    /**
     * Testa se a função destroy está deletando o anúncio corretamente.
     *
     * @return void
     */
    public function testDestroy()
    {
        $anuncio = factory(Anuncio::class)->create();

        $response = $this->delete('/anuncios/' . $anuncio->id);

        $response->assertStatus(302);
        $response->assertRedirect('/anuncios');
        $this->assertDatabaseMissing('anuncios', [
            'id' => $anuncio->id,
        ]);
        Storage::assertMissing('public/images/' . $anuncio->path);
    }
}
/*
É importante notar que neste exemplo estou usando faker para criar usuários e anúncios para os testes.
Também estou usando a trait RefreshDatabase para garantir que o banco de dados esteja limpo antes de cada teste.
Além disso, estou usando o assertDatabaseHas e o assertDeleted para verificar se os dados estão
sendo salvos e apagados corretamente, e estou usando o Storage::assertExists para verificar se a
imagem está sendo salva na pasta correta.
*/