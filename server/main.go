package main

import (
	"../proto"
	"context"
	"flag"
	"google.golang.org/grpc"
	"log"
	"net"
)

// GreeterServer serve GRPC-requests
// SayHello
// SayHelloAgain
type GreeterServer struct {
	Name string
}

// SayHello ...
func (g GreeterServer) SayHello(ctx context.Context, r *service.Request) (*service.Reply, error) {
	log.Println("Request (SayHello) from", r.Name)
	msg := "Hello, " + r.Name + "! I'm " + g.Name
	return &service.Reply{Message: msg}, nil
}

// SayHelloAgain ...
func (g GreeterServer) SayHelloAgain(ctx context.Context, r *service.Request) (*service.Reply, error) {
	log.Println("Request (SayHelloAgain) from", r.Name)
	msg := "Hello again, " + r.Name + "!"
	return &service.Reply{Message: msg}, nil
}

func main() {
	port := flag.String("port", ":8085", "Server port")
	name := flag.String("name", "Server", "Server name")

	lis, err := net.Listen("tcp", *port)
	if err != nil {
		log.Fatalln("Can't listen port", port, err)
	}

	server := grpc.NewServer()

	greeter := GreeterServer{Name: *name}

	service.RegisterGreeterServer(server, greeter)

	log.Println("starting server at", *port)
	server.Serve(lis)
}
