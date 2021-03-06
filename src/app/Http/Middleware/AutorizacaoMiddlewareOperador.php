<?php

namespace qms\Http\Middleware;

use Closure;

class AutorizacaoMiddlewareOperador {
    public function handle($request, Closure $next) {

        if (isset(\Auth::user()->tipo)) {
          $user = \Auth::user()->tipo;

          if (strcmp($user, 'operador') == 0) {
            $alteracoes = \Auth::user()->numero_alteracao_senha;
            $uri = $request->path();

            if (strcmp($uri, 'operador/alterar-senha') == 0 || strcmp($uri, 'operador/update-senha') == 0) {
              //se o caminho for alteração de senha ele deixa passar
              return $next($request);
            } else {
              //if (strcmp($alteracoes, '0') != 0) {
              if ($alteracoes === '0') {
                //se a quantidade de alteracoes for == 0 entao ele mandara sempre para a pagina de alteracao de senha
                return Redirect('/operador/alterar-senha');
              } else {
                //verifica se já se passou um mês e manda ele alterar a data novamente
                $dataAlteracao = \Auth::user()->data_alteracao_senha;
                $dataProximaAlteracao = date('Y/m/d', strtotime('+30 days', strtotime($dataAlteracao)));
                // $time = strtotime($dataAlteracao);
                // $dataUltimaAlteracao = date('Y/m/d',$time);
                $dataAtual = date('Y/m/d');

                // return abort(403, "Data Atual: ".$dataAtual."---  Data da Ultima Alteração: ".
                // $dataUltimaAlteracao."  ------------- Proxima Alteracao: ".$dataProximaAlteracao);
                if ($dataAtual < $dataProximaAlteracao) {
                  return $next($request);
                } else {
                  return Redirect('/operador/alterar-senha');
                }
                //return $next($request);
              }
            }

            //return $next($request);
          } else {
            if (strcmp($user, 'administrador') == 0) {
              $alteracoes = \Auth::user()->numero_alteracao_senha;
              $uri = $request->path();

              if (strcmp($uri, 'administrador/alterar-senha') == 0 || strcmp($uri, 'administrador/update-password') == 0) {
                return $next($request);
              } else {
                if ($alteracoes === '0') {
                  return Redirect('administrador/alterar-senha');
                } else {
                  $dataAlteracao = \Auth::user()->data_alteracao_senha;
                  $dataProximaAlteracao = date('Y/m/d', strtotime('+30 days', strtotime($dataAlteracao)));

                  $dataAtual = date('Y/m/d');

                  if ($dataAtual < $dataProximaAlteracao) {
                    return $next($request);
                  } else {
                    return Redirect('/administrador/alterar-senha');
                  }
                }

              }

              // return Redirect('/acesso-negado-administrador');
            } else {
              // return Redirect('/acesso-negado-atendente');
              if (strcmp($user, 'atendente') == 0) {
                $alteracoes = \Auth::user()->numero_alteracao_senha;
                $uri = $request->path();

                if (strcmp($uri, '/atendente/alterar-senha') == 0 || strcmp($uri, '/atendente/update-senha') == 0) {
                  return $next($request);
                } else {
                  if ($alteracoes === '0') {
                    return Redirect('/atendente/alterar-senha');
                  } else {
                    $dataAlteracao = \Auth::user()->data_alteracao_senha;
                    $dataProximaAlteracao = date('Y/m/d', strtotime('+30 days', strtotime($dataAlteracao)));

                    $dataAtual = date('Y/m/d');

                    if ($dataAtual < $dataProximaAlteracao) {
                      return $next($request);
                    } else {
                      return Redirect('/atendente/alterar-senha');
                    }
                  }

                }

              }

            }
          }
        }
        // return $next($request);
    }
}
