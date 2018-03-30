all: build-modules
	@echo
	@echo "Build complete."
	@echo

build-modules:
	protoc --proto_path=protos --php_out=protos/gen protos/*.proto