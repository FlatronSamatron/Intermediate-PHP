<?php

declare(strict_types=1);
namespace Services;


use App\Services\InvoiceService;
use App\Services\PaymentGatewayService;
use App\Services\SalesTaxService;
use App\Services\EmailService;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase
{
    #[Test]
    public function it_processes_invoice(): void
    {
        $salesTaxServiceMock = $this->createMock(SalesTaxService::class);
        $gatewayServiceMock  = $this->createMock(PaymentGatewayService::class);
        $emailServiceMock    = $this->createMock(EmailService::class);

        $gatewayServiceMock->method('charge')->willReturn(true);

        //given invoice service
        $invoiceService = new InvoiceService($salesTaxServiceMock, $gatewayServiceMock, $emailServiceMock);

        $customer = ['name' => 'name1'];
        $amount   = 150;

        //when process is called

        $result = $invoiceService->process($customer, $amount);

        //then assert invoice is processed successfully
        $this->assertTrue($result);
    }

    #[Test]
    public function it_sends_receipt_email_when_invoice_is_processed(): void
    {
        $salesTaxServiceMock = $this->createMock(SalesTaxService::class);
        $gatewayServiceMock  = $this->createMock(PaymentGatewayService::class);
        $emailServiceMock    = $this->createMock(EmailService::class);

        $gatewayServiceMock->method('charge')->willReturn(true);
        $emailServiceMock
                ->expects($this->once())
                ->method('send')
                ->with(['name' => 'name1'], 'receipt');

        //given invoice service
        $invoiceService = new InvoiceService($salesTaxServiceMock, $gatewayServiceMock, $emailServiceMock);

        $customer = ['name' => 'name1'];
        $amount   = 150;

        //when process is called

        $result = $invoiceService->process($customer, $amount);

        //then assert invoice is processed successfully
        $this->assertTrue($result);
    }
}