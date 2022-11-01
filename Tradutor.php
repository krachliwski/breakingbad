<?php

/**
 *
 ** Classe de tradução em php usando o Google Tradutor.
 *
 ** @author JM [@httd1](https://t.me/httd1)
 *
 **/

class Tradutor
{

	private $de;
	private $para;
	private $proxy;

	/*
	** @param (str) $de Idioma do texto,deixe como null para detecção automática do idioma.
	** @param (str) $para Idioma em que será traduzido.
	** @param IP e porta para uso de proxy. Ex: 127.0.0.1:8080
	*/

	public function __construct($de = 'auto', $para = 'pt', $proxy = null)
	{

		$this->proxy = $proxy;

		$this->de = $de;

		$this->para = $para;
	}

	public function de()
	{
		return $this->de;
	}

	public function para()
	{
		return $this->para;
	}

	public function proxy()
	{
		return $this->proxy;
	}

	/*
	** Traduz um texto de um idioma para o outro.
	*
	** @param (str) $text Texto para ser traduzido.
	*
	** @return Retorna o texto traduzido.
	*/

	public function traduzir($text)
	{
		$traduzir = $this->Request($text, $this->de(), $this->para(), $this->proxy());

		if (isset($traduzir->erro)) {
			return $traduzir->erro;
		}

		$traducao = $traduzir->sentences;

		foreach ($traducao as $str) {
			$ret = $str->trans;
		}

		return $ret;
	}

	/*
	** @param (str) $de Idioma do texto,defina como null para detecção automática do idioma.
	** @param (str) $para Idioma para ser traduzido.
	** @param (str) $text Texto para traduzir. 
	*
	** @return Retorna o texto traduzido.
	*/

	public function traduzLang($de = null, $para, $text)
	{

		if (strlen($text) >= 5000) {
			return 'Limite de caracteres excedido: 500 caract.';
		}

		$de = ($de == null) ? 'auto' : $de;

		$traduz = $this->Request($text, $de, $para, $this->proxy());
		$traducao = $traduz->sentences;

		foreach ($traducao as $str) {
			if (!empty($str->trans)) {
				$ret = $str->trans;
			} else {
				$ret = "";
			}
		}

		return $ret;
	}

	public function listaIdiomas()
	{

		$lista = json_decode(file_get_contents('languages_ids.json'), true);
		$lista_idiomas = $lista['sl'];

		return $lista_idiomas;
	}

	private function Request($q, $sl, $tl, $proxy = null)
	{

		$curl = curl_init();

		if ($proxy != null) {
			curl_setopt($curl, CURLOPT_PROXY, $proxy);
		}

		curl_setopt($curl, CURLOPT_URL, 'https://translate.google.com/translate_a/single?dj=1&q=' . urlencode($q) . '&sl=' . $sl . '&tl=' . $tl . '&hl=pt_BR&ie=UTF-8&oe=UTF-8&client=at&dt=t&dt=ld&dt=qca&dt=rm&dt=bd&dt=md&dt=ss&dt=ex&source=langchg&otf=1');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_USERAGENT, 'GoogleTranslate/5.21.0.RC04.202358723 (Linux; U; Android 4.4.2; SM-G110B)﻿');
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$ret = json_decode(curl_exec($curl));
		curl_close($curl);

		if (isset($ret->sentences)) {
			return $ret;
		} else {
			return json_decode(json_encode(array('erro' => 'Requisições em excesso,use um Proxy.')));
		}
	}
}
