<?php 
namespace Drstock\Providers;


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
       
        $this->app->bind(
                'Drstock\Repositories\Post\PostRepository', 'Drstock\Repositories\Post\EloquentPostRepository'
        );
        $this->app->bind(
                'Drstock\Repositories\Article\ArticleRepository', 'Drstock\Repositories\Article\EloquentArticleRepository'
        );
        $this->app->bind(
                'Drstock\Repositories\Category\CategoryRepository', 'Drstock\Repositories\Category\EloquentCategoryRepository'
        );
         $this->app->bind(
                'Drstock\Repositories\Client\ClientRepository', 'Drstock\Repositories\Client\EloquentClientRepository'
        );
         $this->app->bind(
                'Drstock\Repositories\Provider\ProviderRepository', 'Drstock\Repositories\Provider\EloquentProviderRepository'
        );
          $this->app->bind(
                'Drstock\Repositories\Cmdachat\CmdachatRepository', 'Drstock\Repositories\Cmdachat\EloquentCmdachatRepository'
        );
          $this->app->bind(
        'Drstock\Repositories\ligneachat\LigneachatRepository', 'Drstock\Repositories\ligneachat\EloquentligneachatRepository'
        );
           $this->app->bind(
        'Drstock\Repositories\Invoice\InvoiceRepository', 'Drstock\Repositories\Invoice\EloquentInvoiceRepository'
        );
            $this->app->bind(
         'Drstock\Repositories\Payment\PaymentRepository', 'Drstock\Repositories\Payment\EloquentPaymentRepository'
        );
             $this->app->bind(
                'Drstock\Repositories\Cmdvente\CmdventeRepository', 'Drstock\Repositories\Cmdvente\EloquentCmdventeRepository'
        );
              $this->app->bind(
        'Drstock\Repositories\lignevente\LigneventeRepository', 'Drstock\Repositories\lignevente\EloquentligneventeRepository'
        );
              $this->app->bind(
        'Drstock\Repositories\Invoicevente\InvoiceventeRepository','Drstock\Repositories\Invoicevente\EloquentInvoiceventeRepository'
        );
               $this->app->bind(
        'Drstock\Repositories\Paymentvente\PaymentventeRepository','Drstock\Repositories\Paymentvente\EloquentPaymentventeRepository'
        );
        $this->app->bind(
        'Drstock\Repositories\user\userRepository', 'Drstock\Repositories\user\EloquentuserRepository'
        );

    }

}
