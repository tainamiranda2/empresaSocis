<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\HttpFoundation\Request;
use App\Repository\SocioRepository;
use App\Entity\Socio;
class SocioController extends AbstractController
{
    #[Route('/socio', name: 'app_socio'  , methods:['GET'])]
    public function index(SocioRepository $socioRepository): JsonResponse
    {
        return $this->json([
            'data' => $socioRepository->findAll(),
        ]);
    }
    #[Route('/socio', name: 'socio_Create', methods:['POST'])]
    public function create(Request $resquest, SocioRepository $socioRepository): JsonResponse
    {
        $data=$resquest->request->all();

        $socio= new Socio();
        $socio->setNome($data['nome']);
        $socio->setEndereco($data['endereco']);
        $socio->setTelfone($data['telfone']);
       $socio->setEmpresaId(intval($data['empresa_id']));

        $socioRepository->add($socio, true);

        return $this->json([
            'message' => 'socio(a) criarado(a) com Sucesso!',
        ], 200);
    }

    #[Route('/socio/{id}', name: 'socio_Update', methods:['PUT'])]
    public function update(int $id, Request $request, SocioRepository $socioRepository): JsonResponse
    {
        $socio = $socioRepository->find($id);
        if (!$socio) {
            return $this->json(['message' => 'socio(a) não foi encontrado'], 404);
        }

        $data = $request->request->all();
        $socio->setNome($data['nome']);
        $socio->setEndereco($data['endereco']);
        $socio->setTelfone($data['telfone']);
        $socio->setEmpresaId(intval($data['empresa_id']));

        $socioRepository->update($socio);

        return $this->json([
            'message' => 'socio atualizado(a) com sucesso!'
        ], 200);
    }

    #[Route('/socio/{id}', name: 'socio_Delete', methods:['DELETE'])]
    public function delete(int $id, SocioRepository $socioRepository): JsonResponse
    {
        $socio = $socioRepository->find($id);
        if (!$socio) {
            return $this->json(['message' => 'socio(a) não foi encontrada'], 404);
        }

        $socioRepository->remove($socio);

        return $this->json([
            'message' => 'socio(a) excluído com sucesso!',
        ], 200);
    }
}
