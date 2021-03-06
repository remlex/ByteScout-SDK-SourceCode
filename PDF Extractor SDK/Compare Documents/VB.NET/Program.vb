'*******************************************************************
'       ByteScout PDF Extractor SDK
'                                                                   
'       Copyright © 2016 Bytescout, http://www.bytescout.com        
'       ALL RIGHTS RESERVED                                         
'                                                                   
'*******************************************************************

Imports Bytescout.PDFExtractor

Class Program
	Friend Shared Sub Main(args As String())

        ' Load first document
        Dim document1 As TextExtractor = New TextExtractor()
        document1.RegistrationName = "demo"
        document1.RegistrationKey = "demo"
        document1.LoadDocumentFromFile("comparison1.pdf")

        ' Load second  document
        Dim document2 As TextExtractor = New TextExtractor()
        document2.RegistrationName = "demo"
        document2.RegistrationKey = "demo"
        document2.LoadDocumentFromFile("comparison2.pdf")

        ' Compare documents
        Dim comparer As TextComparer = New TextComparer()
        comparer.RegistrationName = "demo"
        comparer.RegistrationKey = "demo"
        comparer.Compare(document1, document2)

        ' Generate report
        comparer.GenerateHtmlReport("report.html")

        ' Open the report in browser
        System.Diagnostics.Process.Start("report.html")

	End Sub
End Class
