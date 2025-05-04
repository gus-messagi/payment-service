<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Src\Payment\Application\Dtos\Inputs\CreatePaymentInput;
use Src\Payment\Application\Ports\CreatePaymentPort;
use Src\Payment\Application\UseCases\CreatePaymentUseCase;
use Src\Payment\Domain\Enums\PaymentTypeEnum;

final class CreatePaymentController extends Controller
{
    private CreatePaymentPort $useCase;

    public function __construct(CreatePaymentUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(Request $request)
    {
        $user = $request->get("user");
        $amount = $request->input("amount");
        $type = PaymentTypeEnum::from($request->input("type"));



        $dto = new CreatePaymentInput($user, $amount, $type);

        $this->useCase->handle($dto);

        return new Response(null, 201);
    }
}