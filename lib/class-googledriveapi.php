<?php
/**
 * Description.
 *
 * @package lib
 */

if ( ! class_exists( 'ERFGoogleDriveApi' ) ) {
	/**
	 * This Google Drive API handler class is a custom PHP library to handle the Google Drive API calls.
	 *
	 * @class   GoogleDriveApi
	 * @author  CodexWorld
	 * @link	http://www.codexworld.com 
	 * @version 1.0
	 */
	class ERFGoogleDriveApi {
		const OAUTH2_TOKEN_URI = 'https://oauth2.googleapis.com/token';
		const DRIVE_FILE_UPLOAD_URI = 'https://www.googleapis.com/upload/drive/v3/files';
		const DRIVE_FILE_META_URI = 'https://www.googleapis.com/drive/v3/files/';

		/**
		 * Construct class function.
		 *
		 * @since 1.0.0
		 * @param string $params Array params.
		 */
		public function __construct( $params = array() ) {
			if ( count( $params ) > 0 ) {
				$this->initialize( $params );
			}
		}

		/**
		 * Initialize class params.
		 *
		 * @since 1.0.0
		 * @param string $params Array params.
		 */
		public function initialize( $params = array() ) {
			if ( count( $params ) > 0 ) {
				foreach ( $params as $key => $val ) {
					if ( isset( $this->$key ) ) {
						$this->$key = $val;
					}
				}
			}
		}

		/**
		 * Request for a google console access token.
		 *
		 * @since 1.0.0
		 * @param string $client_id client_id.
		 * @param string $redirect_uri client_id.
		 * @param string $client_secret client_id.
		 * @param string $code code.
		 * @throws Exception
		 */
		public function getAccessToken( $client_id, $redirect_uri, $client_secret, $code ) {
			$curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code=' . $code . '&grant_type=authorization_code';
			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $ch, CURLOPT_URL, self::OAUTH2_TOKEN_URI );
			curl_setopt( $ch, CURLOPT_POST, 1 );
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $curlPost );
			$data = json_decode( curl_exec( $ch ), true );
			// $http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );

			// if ( 200 !== $http_code ) {
			// 	$error_msg = __( 'Failed to receieve access token', 'event-request-form' );
            //     if ( curl_errno( $ch ) ) {
			// 		$error_msg = curl_error( $ch );
			// 	}
			// 	throw new Exception( 'Error ' . $http_code . ': ' . $error_msg );
			// }
			return $data;
			// return true;
		}

		/**
		 * Send a file to drive folder.
		 *
		 * @since 1.0.0
		 * @param string $access_token access_token.
		 * @param string $file_content file_content.
		 * @param string $mime_type mime_type.
		 * @throws Exception
		 */
		public function uploadFileToDrive( $access_token, $file_content, $mime_type ) {
			$apiURL = self::DRIVE_FILE_UPLOAD_URI . '?uploadType=media';

			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_URL, $apiURL );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $ch, CURLOPT_POST, 1 );
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch, CURLOPT_HTTPHEADER, array( 'Content-Type: ' . $mime_type, 'Authorization: Bearer ' . $access_token ) );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $file_content );
			$data = json_decode( curl_exec( $ch ), true );
			$http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );

			if ( 200 !== $http_code ) {
				$error_msg = __( 'Failed to upload file to Google Drive', 'event-request-form' );
				if ( curl_errno( $ch ) ) {
					$error_msg = curl_error( $ch );
				}
				throw new Exception( 'Error ' . $http_code . ': ' . $error_msg );
			}

			return $data['id'];
		}

		/**
		 * Update file meta.
		 *
		 * @since 1.0.0
		 * @param string $access_token access_token.
		 * @param string $file_id file_id.
		 * @param string $file_meatadata file_meatadata.
		 * @throws Exception
		 */
		public function UpdateFileMeta( $access_token, $file_id, $file_meatadata ) {
			$apiURL = self::DRIVE_FILE_META_URI . $file_id;

			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_URL, $apiURL );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $ch, CURLOPT_POST, 1 );
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json', 'Authorization: Bearer ' . $access_token ) );
			curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'PATCH' );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $file_meatadata ) );
			$data = json_decode( curl_exec( $ch ), true );
			$http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );

			if ( 200 !== $http_code ) {
				$error_msg = __( 'Failed to update file metadata', 'event-request-form' );
				if ( curl_errno( $ch ) ) {
					$error_msg = curl_error( $ch );
				}
				throw new Exception( 'Error ' . $http_code . ': ' . $error_msg );
			}
			return $data;
		}
	}
}
