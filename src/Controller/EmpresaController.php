<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\HttpFoundation\Request;
use App\Repository\EmpresaRepository;
use App\Entity\Empresa;
class EmpresaController extends AbstractController
{
    #[Route('/empresa', name: 'app_empresa', methods:['GET'])]
    public function index(EmpresaRepository $empresaRepository): JsonResponse
    {
        return $this->json([
            'data' => $empresaRepository->findAll(),
           // 'path' => 'src/Controller/EmpresaController.php',
        ]);
    }
    
    #[Route('/empresa', name: 'empresa_Create', methods:['POST'])]
    public function create(Request $resquest, EmpresaRepository $empresaRepository): JsonResponse
    {
        $data=$resquest->request->all();

        $empresa= new Empresa();
        $empresa->setNome($data['nome']);
        $empresa->setEndereco($data['endereco']);
        $empresa->setTelefone($data['telefone']);

        $empresaRepository->add($empresa, true);

        return $this->json([
            'message' => 'Empresa criada com Sucesso!'
        ], 200);
    }
    #[Route('/empresa/{id}', name: 'empresa_Update', methods:['PUT'])]
    public function update(int $id, Request $request, EmpresaRepository $empresaRepository): JsonResponse
    {
        $empresa = $empresaRepository->find($id);
        if (!$empresa) {
            return $this->json(['message' => 'Empresa não encontrada'], 404);
        }

        $data = $request->request->all();
        $empresa->setNome($data['nome']);
        $empresa->setEndereco($data['endereco']);
        $empresa->setTelefone($data['telefone']);

        $empresaRepository->update($empresa);

        return $this->json([
            'message' => 'Empresa atualizada com sucesso!'
        ], 200);
    }

    #[Route('/empresa/{id}', name: 'empresa_Delete', methods:['DELETE'])]
    public function delete(int $id, EmpresaRepository $empresaRepository): JsonResponse
    {
        $empresa = $empresaRepository->find($id);
        if (!$empresa) {
            return $this->json(['message' => 'Empresa não encontrada'], 404);
        }

        $empresaRepository->remove($empresa);

        return $this->json([
            'message' => 'Empresa excluída com sucesso!'
        ], 200);
    }
}
