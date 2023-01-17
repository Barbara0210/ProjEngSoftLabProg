<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\Comentario;


class ComentarioControllerTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function testIndex()
    {
        // cria alguns comentários
        factory(App\Models\Comentario::class, 10)->create();

        // faz uma requisição GET para a rota "comentarios"
        $this->get('comentarios')
             ->seeStatusCode(200) // verifica se o status code é 200
             ->seeJsonStructure(['comentarios']); // verifica se a resposta contém a estrutura de comentários
    }

    public function testIndexAdmin()
    {
        // cria alguns comentários
        factory(App\Models\Comentario::class, 5)->create();

        // faz uma requisição GET para a rota "comentarios/admin"
        $this->get('comentarios/admin')
             ->seeStatusCode(200) // verifica se o status code é 200
             ->seeJsonStructure(['comentarios']); // verifica se a resposta contém a estrutura de comentários
    }

    public function testCreate()
    {
        // faz uma requisição GET para a rota "comentarios/create"
        $this->get('comentarios/create')
             ->seeStatusCode(200); // verifica se o status code é 200
    }

    public function testStore()
    {
        // cria um comentário válido
        $comentario = factory(App\Models\Comentario::class)->make();

        // faz uma requisição POST para a rota "comentarios" com o comentário
        $this->post('comentarios', $comentario->toArray())
             ->seeStatusCode(302) // verifica se o status code é 302 (redirect)
             ->seeInDatabase('comentarios', $comentario->toArray()); // verifica se o comentário foi salvo no banco de dados
    }

    public function testShow()
    {
        // cria um comentário
        $comentario = factory(App\Models\Comentario::class)->create();

        // faz uma requisição GET para a rota "comentarios/{id}"
        $this->get("comentarios/{$comentario->id}")
             ->seeStatusCode(200) // verifica se o status code é 200
             ->seeJson($comentario->toArray()); // verifica se a resposta é igual ao comentário criado
    }

    public function testEdit()
{
// cria um comentário
$comentario = factory(App\Models\Comentario::class)->create();
// faz uma requisição GET para a rota "comentarios/{id}/edit"
    $this->get("comentarios/{$comentario->id}/edit")
         ->seeStatusCode(200) // verifica se o status code é 200
         ->seeJson($comentario->toArray()); // verifica se a resposta é igual ao comentário criado
}

public function testUpdate()
{
    // cria um comentário
    $comentario = factory(App\Models\Comentario::class)->create();

    // atualiza o comentário
    $comentario->descricao = 'Nova descricao';

    // faz uma requisição PUT para a rota "comentarios/{id}" com a nova descricao
    $this->put("comentarios/{$comentario->id}", $comentario->toArray())
         ->seeStatusCode(302) // verifica se o status code é 302 (redirect)
         ->seeInDatabase('comentarios', $comentario->toArray()); // verifica se o comentário foi atualizado no banco de dados
}

public function testDestroy()
{
    // cria um comentário
    $comentario = factory(App\Models\Comentario::class)->create();

    // faz uma requisição DELETE para a rota "comentarios/{id}"
    $this->delete("comentarios/{$comentario->id}")
         ->seeStatusCode(302) // verifica se o status code é 302 (redirect)
         ->notSeeInDatabase('comentarios', ['id' => $comentario->id]); // verifica se o comentário foi excluido do banco de dados
}}
