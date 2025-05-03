<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Src\User\Application\Dtos\Input\CreateUserInput;
use Src\User\Application\UseCases\CreateUserUseCase;
use Src\User\Domain\ValueObjects\UserEmail;
use Src\User\Domain\ValueObjects\UserDocument;


class CreateUserController extends Controller
{

    protected $useCase;

    public function __construct(CreateUserUseCase $createUserUseCase)
    {
        $this->useCase = $createUserUseCase;
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $email = new UserEmail($request->input("email"));
        $document = new UserDocument($request->input("document"));
        $name = $request->input("name");

        $dto = new CreateUserInput($name, $document, $email);

        $response = $this->useCase->handle($dto);

        return new Response($email->getValue(), 200);
    }
}
