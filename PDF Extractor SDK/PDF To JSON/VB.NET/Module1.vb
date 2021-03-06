'*******************************************************************
'       ByteScout PDF Extractor SDK
'                                                                   
'       Copyright © 2016 Bytescout, http://www.bytescout.com        
'       ALL RIGHTS RESERVED                                         
'                                                                   
'*******************************************************************

Imports System
Imports System.Collections.Generic
Imports System.Text
Imports Bytescout.PDFExtractor
Imports System.Diagnostics

Namespace ConsoleApplication1
    Class Program
        Shared Sub Main(ByVal args As String())

            ' Create Bytescout.PDFExtractor.JSONExtractor instance
            Dim extractor As New JSONExtractor()
            extractor.RegistrationName = "demo"
            extractor.RegistrationKey = "demo"

            ' Load sample PDF document
            extractor.LoadDocumentFromFile("sample3.pdf")

            extractor.SaveJSONToFile("output.json")

            Console.WriteLine()
            Console.WriteLine("Data has been extracted to 'output.json' file.")
            Console.WriteLine()
            Console.WriteLine("Press any key to continue and open JSON file in default viewer...")
            Console.ReadKey()

            Process.Start("output.json")
        End Sub
    End Class
End Namespace

