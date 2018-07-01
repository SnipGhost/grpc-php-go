if !(command -v composer >/dev/null 2>&1)
then
	echo "Error: required composer"
	exit
fi

echo "Starting composer"
# composer require "grpc/grpc"
# composer require "google/protobuf"
composer install

echo "Statring protoc"
protoc --proto_path=proto --go_out=plugins=grpc:proto --php_out=proto --grpc_out=proto --plugin=protoc-gen-grpc=/usr/local/bin/grpc_php_plugin proto/*.proto